const puppeter = require("puppeteer");

const mysql = require("mysql2");

let parcels = [
  
  ["018-4116-4383", "$348,76"],
  ["018-7038-1546", "$32.151,29"],
  ["018-8085-3289", "$4.492,89"],
  ["018-8040-1601", "$6.359,95"],
  ["018-4115-4313", "$38.319,34"],
];

async function regrid(regridSearched, minimo) {
  try {
    let retornoRegrid = [];

    const regrid_browser = await puppeter.launch({ headless: false });

    const regrid_page = await regrid_browser.newPage();

    await regrid_page.goto("https://app.regrid.com/us/#b=admin");

    await regrid_page.focus('input[name="search"]');

    await regrid_page.keyboard.type(regridSearched);

    await regrid_page.keyboard.press("Enter");

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
    reject(error);
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
  const regridCasa = await regrid(parcelID, minimo);
  console.log(regridCasa);

  const maps = await googleMaps(regridCasa[2]);
  console.log(maps);

  const valorCasa = await houseValue(maps[0]);
  console.log(valorCasa);

  const femaURL = await fema(maps[0]);
  console.log(femaURL);

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
}

//['018-7038-1546','$32.151,29'],
async function listaScasas() {
  for await (casas of parcels) {
    await constuirCasa(casas[0], casas[1]);
  }
}

listaScasas();
