const puppeter = require("puppeteer");

const mysql = require("mysql2");

let parcels = [
  ["020-1064-0149", "$3.128,44"],
  //["020-1064-0146", "$585,93"],
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

 

    await regrid_page.type('[name="search"]', regridSearched);

    await regrid_page.waitForSelector(".all-results");

    console.log("james");

    await regrid_page.click('[data-skip-pjax="1"]');
    console.log("william");

    //headline parcel-result

    /*

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

    */
  } catch (error) {}
}

async function constuirCasa(parcelID, minimo) {
  regrid(parcelID);
  console.log(`Inicio Parcel: ${parcelID}`);
}

//['018-7038-1546','$32.151,29'],
async function listaScasas() {
  for await (casas of parcels) {
    await constuirCasa(casas[0], casas[1]);
  }
}

listaScasas();
