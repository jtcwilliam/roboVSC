const puppeter = require("puppeteer");

async function teste() {
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

    /*
    const houseValue = await page.$eval(
      "._3GqYV__title",
      (el) => el.textContent
    );

    console.log(houseValue);
    */

    let valorCasa = [];
    await page.waitForSelector("._2q6qs__value");

    const linhas = await page.$$("._2q6qs__value");

    for (let index = 0; index < linhas.length; index++) {
      const linha = linhas[index];

      const dado = await page.evaluate((linha) => linha.textContent, linha);

      valorCasa.push(dado);
    }

    console.log(valorCasa[0]);

    //console.log(`valor da casa: ${valorDacasa} \n \n`);
    console.log("fim casa");

    //_2q6qs__value

    browser.close();

    return true;
  } catch (error) {
    console.log(error);
  }
}

teste();
