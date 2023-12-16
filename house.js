const puppeter = require("puppeteer");

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

    const foundHouse = await page.$(".react-autosuggest__suggestion-wrapper");

    if (foundHouse != null) {
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
    } else {
      const casafinal = [null, null, null];
    }
    await browser.close();

    return casafinal;
  } catch (error) {
    return false;
  }
}

console.log(houseValue("228 E Donald St, South Bend, IN 46613"));
