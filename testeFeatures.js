const puppeter = require("puppeteer");

const mysql = require("mysql2");

let parcels = [

  //["018-8040-1601", "$6.359,95"],
  ["018-4115-4313", "$38.319,34"],
  ["018-2049-1726", "$2.458,75"],
  ["018-4076-2771", "$11.260,46"],
  ["018-7012-0453", "$332,14"],
  ["018-3067-257802", "$30.259,89"],
  ["018-4078-2831", "$2.213,34"],

  /*
  ['018-7076-2781','$1.373,42'], 
 
  ['018-7154-5469','$494,23'], 
  ['018-2156-5752','$20.931,33'], 
  ['018-4043-1608','$24.250,47'], 
  ['018-7092-3309','$6.036,54'], 
  ['018-2021-0634','$8.332,94'], 
  
  
  
  
  ['018-3059-2296','$7.594,59'], 
  ['018-7057-2112','$70.238,98'], 
  ['018-1054-2294','$725,96'], 
  ['018-3067-2551','$297,82'], 
  ['018-2125-4586','$3.424,12'], 
  ['028-1002-0166','$3.072,65'], 
  ['018-8010-047601','$3.327,02'], 
  ['018-4039-1449','$309,55'], 
  ['018-1046-2008','$380,53'], 
  ['018-2058-2107','$599,54'], 
  ['018-7040-1610','$2.392,27'], 
  ['018-4015-0530','$4.543,16'], 
  ['018-8031-1302','$12.702,88'], 
  ['018-4009-0303','$1.995,09'], 
  ['018-8030-1258','$4.856,68'], 
  ['018-7042-1646','$336,67'], 
  ['018-7042-1648','$612,90'], 
  ['018-7057-2119','$20.556,94'], 
  ['018-2154-5709','$1.861,48']

  */
];

async function regrid(regridSearched, minimo) {
  try {
    let retornoRegrid = [];

    const regrid_browser = await puppeter.launch({ headless: false });

    const regrid_page = await regrid_browser.newPage();

    await regrid_page.goto("https://app.regrid.com/", {
      timeout: 60000,
      waitUntil: "domcontentloaded",
    });

    await regrid_page.type('[name="user[email]"]', "jtcwilliam@gmail.com");
    await regrid_page.type('[name="user[password]"]', "harlem");

    await regrid_page.keyboard.press("Enter");

    await regrid_page.waitForNavigation();

    await regrid_page.goto(
      "https://william-ferreira.regrid.com/m/vscquerys?_gl=1*p8gdih*_ga*MTM4MjM1NTU0Ny4xNzAyNzM2NzQ3*_ga_NGWML8455J*MTcwMjczNjc0Ni4xLjEuMTcwMjczNjc0OS4wLjAuMA..",
      {
        timeout: 60000,
        waitUntil: "domcontentloaded",
      }
    );

    await regrid_page.type('[name="search"]', regridSearched);

    await regrid_page.waitForSelector(".parcel-details");

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
  try {
    let dadosCasa;
    const browser = await puppeter.launch({ headless: false });
    const page = await browser.newPage();
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

    

    if (foundHouse != null) {
      //await page.waitForSelector("#react-autowhatever-1--item-0");

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

        if (linhasHOA.indexOf(linha) == 9) {
          hoa = lHOA;
        }
      }

      hoa = hoa.replace("HOA/COA", "");

      console.log(hoa, valorCasa[0]);

      let linkHouse = page.url();

      dadosCasa = [hoa, valorCasa[0], linkHouse];
    } else {
      dadosCasa = [null, null, null];
    }

    await browser.close();
    return dadosCasa;
  } catch (error) {
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
  details
) {
  try {
    const connection = mysql.createConnection({
      host: "appraiser.mysql.dbaas.com.br",
      user: "appraiser",
      password: "M@r1@He1en@",
      database: "appraiser",
    });

    let stmt = `INSERT INTO apps ( parcel ,flood,auction, regridUrl, aprraisalUrl, google, minimo , observacao , dataUp,marketValue ,status, hoa, details)  VALUES ?`;
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
    valorCasa[2]
  );

  /*

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
    null,
    "1",
    null,
    null
  );
  */

  console.log(`\n fim do parcel: ${parcelID} \n`);
}

//['018-7038-1546','$32.151,29'],
async function listaScasas() {
  for await (casas of parcels) {
    await constuirCasa(casas[0], casas[1]);
  }
}

listaScasas();
