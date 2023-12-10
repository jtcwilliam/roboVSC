async function enterAppraiser(url, searchQuery) {
    try {

        const browser = await puppeter.launch({ headless: false });
        const page = await browser.newPage()
        await page.goto(url);



        await page.focus('#parcel-search-property-key');

        await page.keyboard.type(searchQuery);

        await page.keyboard.press('Enter');




        await page.waitForNavigation({ waitUntil: 'networkidle2' });



        await page.pdf({ path: searchQuery + '.pdf', margin: "none", })

        await browser.close();

        return true;




    } catch (error) {
        console.log(error)
    }
}


 