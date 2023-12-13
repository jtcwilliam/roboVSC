const puppeter = require("puppeteer");

async function regrid(regridSearched) {
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

    retornoRegrid.push(taxinfo, appraiserUrl, coordenadas, urlRegrid);

    await regrid_browser.close();

    return retornoRegrid;
  } catch (error) {}
}

async function houseValue() {
  try {
    const browser = await puppeter.launch({ headless: false });
    const page = await browser.newPage();
    await page.goto("https://login.propstream.com/", {
      timeout: 60000,
      waitUntil: "domcontentloaded",
    });

    await page.type('[name="username"]', "ruthvasco4x4@gmail.com");
    await page.type('[name="password"]', "Ruth131523#");

    //type="submit"
    await page.click('[type="submit"]');
    await page.waitForNavigation();

    await page.waitForSelector("._1vzm3__dashboardSearchItem");

    await page.type(
      '[type="text"]',
      "1618 N Brookfield St, South Bend, IN 46628"
    );

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

    await browser.close();
    return valorCasa[0];
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

async function constuirCasa() {
  const valorCasa = await houseValue();
  console.log(valorCasa);

  const regridCasa = await regrid("018-7013-049701");
  console.log(regridCasa);

  const maps = await googleMaps(regridCasa[2]);
  console.log(maps);

  const femaURL = await fema(maps[0]);
  console.log(femaURL);

}

constuirCasa();
