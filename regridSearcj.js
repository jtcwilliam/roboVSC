const puppeter = require("puppeteer");

const mysql = require("mysql2");

let parcels = [
  ["020-1064-0149", "$3.128,44"],
  //["020-1064-0146", "$585,93"],
  //["018-2090-3374", "$46.213,78"],

  /*
  ["018-1045-1944", "$3.181,09"],
  ["018-7047-1812", "$7.836,45"],
  ["018-7037-1498", "$53.532,83"],
  ["018-4016-0550", "$7.127,36"],

  ["018-2070-2583", "$740,90"],
  ["018-2070-2585", "$505,90"],
  ["018-2070-2586", "$505,90"],

  ["018-2093-3520", "$3.249,69"],
  ["018-1083-3464", "$625,81"],

  ["018-2088-3310", "$45.565,96"],
  ["018-2088-3314", "$3.836,20"],
  ["018-8045-1783", "$3.905,89"],

  ["018-4006-0212", "$34.371,49"],
  ["021-1089-3332", "$2.458,09"],
  ["018-8021-084201", "$72.531,50"],
  ["018-2147-5485", "$2.702,75"],
  ["018-4010-0336", "$34.948,59"],

  ["018-8087-3347", "$3.462,48"],
  ["018-2079-2890", "$18.190,18"],
  ["018-2156-5758", "$6.320,14"],
  ["018-4117-4445", "$1.915,30"],
  ["018-8085-3244", "$3.643,50"],

  ["018-7058-2166", "$2.173,38"],
  ["018-4030-1082", "$2.907,63"],
  ["018-8059-2343", "$1.167,30"],
  ["018-7047-1818", "$57.564,27"],
  ["018-8012-0557", "$6.959,18"],

  ["018-8059-2371", "$52.090,34"],
  ["018-4050-1876", "$316,72"],
  ["018-2112-412002", "$1.196,41"],
  ["018-4001-0007", "$5.390,02"],
  ["018-4115-4358", "$18.344,25"],
  ["018-4069-2538", "$2.428,42"],
  ["018-8046-1834", "$13.960,45"],
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

    //name="user[email]"

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

 
    

    await regrid_page.waitForSelector(".mapboxgl-ff");

 

    await regrid_page.type('[name="search"]', regridSearched);

    await regrid_page.focus('input[name="search"]');
 
 

    return retornoRegrid;
  } catch (error) {}
}

async function houseValue(addres) {
  try {
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

    await page.type('[type="text"]', `${addres}`);

    await page.focus('[type="text"]');

    await page.waitForSelector("#react-autowhatever-1--item-0");

    await page.click("#react-autowhatever-1--item-0");

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

    const casafinal = [hoa, valorCasa[0], linkHouse];

    await browser.close();
    return casafinal;
  } catch (error) {
    const casafinal = [null, null, null];
    return casafinal;
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

  /*
  const maps = await googleMaps(regridCasa[2]);

  //  const valorCasa = await houseValue(maps[0]);

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
