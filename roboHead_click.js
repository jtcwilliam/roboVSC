const puppeter = require("puppeteer");

const mysql = require("mysql2");

let propriedades = 0;

let parcels = [
 
  
];

async function regrid(regridSearched, minimo) {
  try {
    let retornoRegrid = [];

    const regrid_browser = await puppeter.launch({ headless: false });

    const regrid_page = await regrid_browser.newPage();

    await regrid_page.goto("https://app.regrid.com/us/#b=admin", {
      timeout: 60000,
      waitUntil: "domcontentloaded",
    });

    //


    //await regrid_page.type('[name="search"]', regridSearched);


    await regrid_page.type('[id="glmap-search-query"]', regridSearched);

    await regrid_page.keyboard.press("Enter");

    await regrid_page.waitForNavigation();

   

    //await regrid_page.waitForSelector(".all-results");

    //await regrid_page.click('[data-skip-pjax="1"]');

    await regrid_page.waitForSelector(".parcel-details");

    console.log("abriu o regrid");

    const linhas = await regrid_page.$$("tr");

    let coordenadas;
    let appraiserUrl = null;
    let taxinfo = null;

    for (let index = 0; index < linhas.length; index++) {
      const linha = linhas[index];

      const dado = await regrid_page.evaluate(
        (linha) => linha.textContent,
        linha
      );

      let coord = dado.includes("Centroid Coordinates");

      /*

      let urlApp = dado.includes("Source URL");

      let tax = dado.includes("Tax Info URL");

      if (tax) {
        taxinfo = dado.replace("Tax Info URL", "");
      }

      if (urlApp) {
        appraiserUrl = dado.replace("Source URL", "");
      }*/

      if (coord) {
        coordenadas = dado.replace("Centroid Coordinates", "");
      }
    }

    const urlRegrid = regrid_page.url();

    retornoRegrid.push(taxinfo, appraiserUrl, coordenadas, urlRegrid, minimo);

    await regrid_browser.close();

    return retornoRegrid;
  } catch (error) {}
}

async function houseValue(addres) {
  let dadosCasa;
  let landValue;
  let browser = await puppeter.launch({ headless: false });
  let page = await browser.newPage();
  try {
    await page.setViewport({
      width: 1920,
      height: 1080,
    });

    await page.goto("https://login.propstream.com/", {
      timeout: 60000,
      waitUntil: "domcontentloaded",
    });

    await page.type('[name="username"]', "ruthvasco4x4@gmail.com");
    await page.type('[name="password"]', "Ruth131523#");

    await page.click('[type="submit"]');
    await page.waitForNavigation();

    await page.waitForSelector("._1vzm3__dashboardSearchItem");

    addres = addres.replace(", EUA", "");

    await page.type('[type="text"]', `${addres}`);

    await page.focus('[type="text"]');

    await page.waitForSelector(".react-autosuggest__suggestion-wrapper");
    const foundHouse = await page.$(".react-autosuggest__suggestion-wrapper");

    if (foundHouse != undefined) {
      await page.focus(".react-autosuggest__suggestion-wrapper");

      //await page.click("#react-autowhatever-1--item-0");

      await page.click(".react-autosuggest__suggestion-wrapper");

      await page.waitForSelector("._3GqYV__title");

      let valorCasa = [];

      const linhas = await page.$$("._2q6qs__value");

      for (let index = 0; index < linhas.length; index++) {
        const linha = linhas[index];

        const dado = await page.evaluate((linha) => linha.textContent, linha);

        valorCasa.push(dado);
      }

      await page.waitForSelector(".CDqWq__rightSide");

      await page.click(
        '[class="_3FtuS__border-blue _31TrE__wideButton _3LneW__tealButton"]'
      );

      const linhasHOA = await page.$$(".twfRj__item");

      let hoa;
      for (let index = 0; index < linhasHOA.length; index++) {
        const linha = linhasHOA[index];

        const lHOA = await page.evaluate((linha) => linha.textContent, linha);

        // console.log(lHOA);

        if (linhasHOA.indexOf(linha) == 9) {
          hoa = lHOA;
        }
      }
      await page.waitForSelector("._1TI2k__label");
      await page.waitForSelector("._1NSwY__value");

      const linhasLand = await page.$$("._1NSwY__value  ");
      //_1TI2k__label
      const labelLand = await page.$$("._1TI2k__label  ");

      for (let index = 0; index < linhasLand.length; index++) {
        const linha = linhasLand[index];
        const label = labelLand[index];

        const lLand = await page.evaluate((linha) => linha.textContent, linha);
        const lbl_land = await page.evaluate(
          (label) => label.textContent,
          label
        );

        //console.log(labelLand.indexOf(label) + ":" + lbl_land + "  " + lLand);

        if (lbl_land == "Market Land Value") {
          console.log(labelLand.indexOf(label) + ":" + lbl_land + "  " + lLand);

          landValue = lLand;
        }
        /*      40   - 39
    
        */
      }

      hoa = hoa.replace("HOA/COA", "");

      //console.log(hoa, valorCasa[0]);

      let linkHouse = page.url();

      dadosCasa = [hoa, valorCasa[0], linkHouse, landValue];

      // await page.click('[class="_2bApT__iconQuestion"]');
      await browser.close();
      return dadosCasa;
    } else {
      dadosCasa = [null, null, null, null];

      await browser.close();

      return dadosCasa;
    }
  } catch (error) {
    await browser.close();
    dadosCasa = [null, null, null];
    return dadosCasa;
  }
}

async function googleMaps(coordenadas) {
  try {
    let googleData = [];
    const googleBrowser = await puppeter.launch({ headless: false });
    const googlePage = await googleBrowser.newPage();
    await googlePage.goto("https://www.google.com.br/maps");

    await googlePage.focus('input[name="q"]');

    await googlePage.keyboard.type(coordenadas);

    await googlePage.keyboard.press("Enter");

    await googlePage.waitForNavigation();

    await googlePage.waitForSelector(".DkEaL");

    const addresGoogle = await googlePage.$eval(
      ".DkEaL",
      (el) => el.textContent
    );

    googleData.push(addresGoogle, googlePage.url());

    googleBrowser.close();

    return googleData;
  } catch (error) {
    reject(error);
  }
}

async function fema(endereco) {
  try {
    const femaBrowser = await puppeter.launch({ headless: false });

    const femaPage = await femaBrowser.newPage();

    const addresFema =
      "https://msc.fema.gov/portal/search?AddressQuery=" + endereco;

    await femaPage.goto(addresFema);

    const urlFema = femaPage.url();

    femaBrowser.close();

    return urlFema;
  } catch (error) {
    reject(error);
  }
}

async function inserirBanco(
  parcel,
  flood,
  auction,
  regridUrl,
  aprraisalUrl,
  google,
  minimo,
  observacao,
  dataUp,
  marketValue,
  status,
  hoa,
  details,
  landValue
) {
  try {
    const connection = mysql.createConnection({
      host: "prod_appraiser.mysql.dbaas.com.br",
      user: "prod_appraiser",
      password: "M@r1@He1en@",
      database: "prod_appraiser",

      /*
      host: "127.0.0.1",
      user: "root",
      password: "",
      database: "appraiser",
      */
    });

    let dataInserir;
    const event = new Date();

    dataInserir = `${event.getFullYear()}/${
      event.getMonth() + 1
    }/${event.getDate()} ${event.getHours()}:${event.getMinutes()}:${event.getSeconds()}`;

    console.log(dataInserir);

    let stmt = `INSERT INTO apps ( parcel ,flood,auction, regridUrl, aprraisalUrl, google, minimo , observacao , dataUp,marketValue ,status, hoa, details, landValue)  VALUES ?`;
    let todos = [
      [
        parcel,
        flood,
        auction,
        regridUrl,
        aprraisalUrl,
        google,
        minimo,
        observacao,
        dataInserir,
        marketValue,
        status,
        hoa,
        details,
        landValue,
      ],
    ];

    connection.query(stmt, [todos], (err, results, fields) => {
      if (err) {
        return console.error(err.message);
      }
      // get inserted rows
      console.log("Row inserted:" + results.affectedRows);

      propriedades += 1;

      console.log(propriedades);

      connection.close();
    });
  } catch (error) {
    reject(error);
  }
}

async function constuirCasa(parcelID, minimo) {
  console.log(`Inicio Parcel: ${parcelID}`);
  const regridCasa = await regrid(parcelID, minimo);

  const maps = await googleMaps(regridCasa[2]);

  const valorCasa = await houseValue(maps[0]);

  const femaURL = await fema(maps[0]);

  const date = new Date();

  const dataUP =
    date.getMonth() + 1 + "/" + date.getDate() + "/" + date.getFullYear();

  const bancoDados = await inserirBanco(
    parcelID,
    femaURL,
    "22",
    regridCasa[3],
    regridCasa[1],
    maps[1],
    regridCasa[4],
    regridCasa[0],
    dataUP,
    valorCasa[1],
    "1",
    valorCasa[0],
    valorCasa[2],
    valorCasa[3]
  );

  console.log(`\n fim do parcel: ${parcelID} \n`);
}

//['018-7038-1546','$32.151,29'],
async function listaScasas() {
  for await (casas of parcels) {
    await constuirCasa(casas[0], casas[1]);
  }
}

listaScasas();
