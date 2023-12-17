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

        //  console.log(labelLand.indexOf(label) + ":" + lbl_land + "  " + lLand);

        if (labelLand.indexOf(label) == 40) {
          console.log(labelLand.indexOf(label) + ":" + lbl_land + "  " + lLand);
        }
        /*      40   - 39
    
        */
      }

      hoa = hoa.replace("HOA/COA", "");

      console.log(hoa, valorCasa[0]);

      let linkHouse = page.url();

      dadosCasa = [hoa, valorCasa[0], linkHouse];

      // await page.click('[class="_2bApT__iconQuestion"]');
      await browser.close();
      return dadosCasa;
    } else {
      dadosCasa = [null, null, null];

      await browser.close();

      return dadosCasa;
    }
  } catch (error) {
    console.log(error);
    await browser.close();
    dadosCasa = [null, null, null];
    return dadosCasa;
  }
}

export { houseValue };
