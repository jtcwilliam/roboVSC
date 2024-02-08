 


const mysql = require("mysql2");

let parcels = [
  ["018-4093-3414", "$19.045,88"],
  ["018-7084-3057", "$4.059,62"],
  ["018-7084-3060", "$4.369,29"],
  ["018-7084-3053", "$6.929,96"],
  ["018-8058-2336", "$3.373,31"],
  ["018-7084-3059", "$4.369,35"],
  ["018-4044-1638", "$2.670,64"],
  ["018-2049-1714", "$25.572,06"],
  ["018-7053-2004", "$4.496,38"],
  ["018-2171-6342", "$1.235,47"],
  ["018-2116-4269", "$539,37"],
  ["018-3075-2982", "$601,39"],
  ["018-3075-2984", "$601,37"],
  ["018-3075-2987", "$601,38"],
  ["018-3076-3020", "$601,38"],
  ["018-3076-3040", "$601,36"],
  ["018-3075-2971", "$633,30"],
  ["018-1049-2081", "$4.946,30"],
  ["016-1105-4137", "$3.698,35"],
  ["016-1031-1302", "$6.334,67"],
  ["018-7048-1872", "$8.861,66"],
  ["018-4030-108102", "$2.700,59"],
  ["002-2239-9783", "$390,47"],
  ["018-3067-2555", "$297,82"],
  ["018-4032-1154", "$2.543,42"],
  ["018-3082-3291", "$305,47"],
  ["018-1038-1670", "$639,36"],
  ["018-8060-2385", "$506,43"],
  ["018-8037-1537", "$20.080,36"],
  ["018-4078-2829", "$1.128,26"],
  ["001-1098-3326", "$2.238,19"],
  ["018-8051-2056", "$4.164,53"],
  ["018-1037-1629", "$590,54"],
  ["018-1037-1628", "$590,56"],
  ["018-1021-0859", "$14.313,48"],
  ["018-2180-6732", "$4.040,12"],
  ["002-1025-0640", "$392,15"],
  ["018-2093-3498", "$20.485,13"],
  ["018-8059-2342", "$44.710,68"],
  ["018-3076-3038", "$12.519,50"],
  ["018-2020-0615", "$8.084,66"],
  ["018-2122-4492", "$32.035,47"],
  ["018-2082-3014", "$35.594,61"],
  ["018-3076-3044", "$6.140,67"],
  ["018-8030-1245", "$2.056,85"],
  ["018-2021-0637", "$30.485,26"],
  ["018-7015-0597", "$2.642,11"],
  ["018-2116-4267", "$9.171,33"],
  ["018-8013-0618", "$8.852,23"],
  ["014-1100-3516", "$1.634,18"],
  ["018-6069-2353", "$567,10"],
  ["018-2074-2697", "$1.144,93"],
  ["018-8106-4018", "$4.318,13"],
  ["018-2148-5518", "$1.401,72"],
  ["018-2158-5825", "$5.677,97"],
  ["018-2089-3351", "$1.315,39"],
  ["018-8033-1440", "$2.159,98"],
  ["018-8085-3277", "$1.969,61"],
  ["018-8086-3332", "$2.122,54"],
  ["018-8154-555901", "$2.319,26"],
  ["018-1021-0860", "$32.383,46"],
  ["018-2075-2741", "$13.313,39"],
  ["018-8052-2105", "$11.763,84"],
  ["018-3078-3096", "$10.095,93"],
  ["018-7068-2516", "$17.925,43"],
  ["018-2113-4146", "$19.046,02"],
  ["018-2087-3268", "$6.702,66"],
  ["018-7043-170101", "$1.426,69"],
  ["018-4012-0422", "$7.211,96"],
  ["018-8021-0842", "$6.870,81"],
  ["018-2150-5578", "$14.330,95"],
  ["018-2013-0309", "$5.893,56"],
  ["018-1045-193601", "$11.729,81"],
  ["018-2076-2776", "$18.995,55"],
  ["018-2084-3107", "$1.610,28"],
  ["018-7082-2993", "$1.835,84"],
  ["018-2014-0363", "$6.130,52"],
  ["018-2014-0365", "$67.169,71"],
  ["018-8093-3562", "$2.399,23"],
  ["018-2054-1948", "$2.435,45"],
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

    await regrid_page.keyboard.press("Enter");

    await regrid_page.waitForNavigation();

    await regrid_page.type('[name="search"]', regridSearched);

    await regrid_page.waitForSelector(".all-results");

    await regrid_page.click('[data-skip-pjax="1"]');

    await regrid_page.waitForSelector(".parcel-details");

    console.log("abriu o regrid");

    const linhas = await regrid_page.$$("tr");

    let coordenadas;
    let appraiserUrl;
    let taxinfo;

    for (let index = 0; index < linhas.length; index++) {
      const linha = linhas[index];

      const dado = await regrid_page.evaluate(
        (linha) => linha.textContent,
        linha
      );

      let coord = dado.includes("Centroid Coordinates");

      let urlApp = dado.includes("Source URL");

      let tax = dado.includes("Tax Info URL");

      if (tax) {
        taxinfo = dado.replace("Tax Info URL", "");
      }

      if (urlApp) {
        appraiserUrl = dado.replace("Source URL", "");
      }

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
      host: "appraiser.mysql.dbaas.com.br",
      user: "appraiser",
      password: "M@r1@He1en@",
      database: "appraiser",
      /*
      host: "127.0.0.1",
      user: "root",
      password: "",
      database: "appraiser",
      */
    });

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
        dataUp,
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
    "17",
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