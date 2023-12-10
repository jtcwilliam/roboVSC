const puppeter = require("puppeteer");

 








async function enterRegrid( searchQuery) {
    try {

        const regrid_browser = await puppeter.launch({ headless: false });
        const regrid_page = await regrid_browser.newregrid_page()
        await regrid_page.goto('https://app.regrid.com/us/#b=admin');



        await regrid_page.focus('input[name="search"]');

        await regrid_page.keyboard.type(searchQuery);

        await regrid_page.keyboard.press('Enter');




        await regrid_page.waitForNavigation();

        await regrid_page.focus('.tt-menu');
        await regrid_page.keyboard.press('Enter');

        await regrid_page.waitForNavigation({ waitUntil: 'networkidle2' });

       // await regrid_page.pdf({ path: searchQuery + '.pdf', margin: "none", })

        await regrid_browser.close();

        console.log('good')




    } catch (error) {
        console.log(error)
    }
}


enterRegrid('02-11-103-001');





/*

enterAppraiser("https://vermilionil.devnetwedge.com/", '01-12-305-005' )


enterAppraiser("https://vermilionil.devnetwedge.com/", '02-11-103-001' )
 

const dados = [
    '23-16-400-008',
    '01-12-305-005',
    '01-12-305-011',
    '01-12-326-003',
    '01-12-326-005',
    '01-12-328-017',
    '02-11-103-001',
    '03-11-127-010',
    '03-11-132-004',
    '03-11-476-003',
    '03-12-105-002',
    '03-12-105-003',
    '03-12-107-006',
    '03-12-108-012',
    '03-12-108-013',
    '03-12-127-018',
    '03-12-127-020',
    '03-12-129-001',
    '03-12-129-002',
    '03-12-160-002',
    '03-12-163-017',
    '03-12-163-019',
    '03-12-163-023',
    '03-12-351-003',
    '03-12-355-011',
    '08-12-178-006',
    '08-12-327-007',
    '08-12-351-007',
    '14-31-326-009',
    '17-14-300-016',
    '18-17-403-001',
    '18-20-427-025',
    '18-20-427-026',
    '18-20-427-027',
    '18-20-427-028',
    '18-20-427-029',
    '18-20-427-030',
    '18-20-429-017',
    '18-20-429-018',
    '18-21-303-004'

];


const dadosB = [
    '23-16-400-008',
    '18-20-429-018',
    '01-12-305-005'

];

let i = 0;




for (let index = 0; index < dadosB.length; index++) {

    async function criarArquivos(appraiser) {
        await enterAppraiser("https://vermilionil.devnetwedge.com/", dadosB[index]);
    }

    criarArquivos(dadosB[index]);



}



//enterRegrid('https://app.regrid.com/us/#b=admin', '02-11-103-001');



*/