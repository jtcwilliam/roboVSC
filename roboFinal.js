const puppeter = require("puppeteer");



//para servidor de banco de dados
const mysql = require('mysql2');


const ftp = require("basic-ftp")
// ESM: import * as ftp from "basic-ftp"




async function gravarFTP(fileName, sendFile) {
    const client = new ftp.Client()
    client.ftp.verbose = true
    try {
        await client.access({
            host: "ftp.wmhtecnologia.com.br",
            user: "wmhtecnologia3",
            password: "M@r1@He1en@123",
            secure: false
        })

        await client.uploadFrom(fileName, "/public_html/appraiser/files/" + sendFile);
        //  await client.downloadTo("README_COPY.md", "README_FTP.md")
    }
    catch (err) {
        console.log(err)
    }
    client.close()
}

/*

 

*/


let dados = [
 
    ['018-7014-0543','$3.789,22'],
    ['020-1064-0149','$3.128,44']
    

];









function processItem(regridSearched, minimo) {
    return new Promise(async (resolve, reject) => {

        try {



            /*
            const browser = await puppeter.launch({ headless: false });
            const page = await browser.newPage()
            await page.goto('https://vermilionil.devnetwedge.com/');

            await page.focus('#parcel-search-property-key');

            await page.keyboard.type(appSearched);

            await page.keyboard.press('Enter');

            await page.waitForNavigation({ waitUntil: 'networkidle2' });

            // url do appraiser
            const urlAppraiser = await page.url();


            await browser.close();

            */


            //regrid

            console.log(`Parcel id: ${regridSearched} \n`);
            const regrid_browser = await puppeter.launch({ headless: false });
            const regrid_page = await regrid_browser.newPage()
            await regrid_page.setViewport({ width: 1920, height: 4000 });

            await regrid_page.goto('https://app.regrid.com/us/#b=admin');

            await regrid_page.focus('input[name="search"]');

            await regrid_page.keyboard.type(regridSearched);

            await regrid_page.keyboard.press('Enter');

            await regrid_page.waitForNavigation({ waitUntil: 'networkidle2' });


            const linhas = await regrid_page.$$('tr');

            let coordenadas = '';
            let appraiserUrl = '';
            let taxinfo;

            for (let index = 0; index < linhas.length; index++) {

                const linha = linhas[index];

                const dado = await regrid_page.evaluate(linha => linha.textContent, linha);


                //  console.log(dado);

                let coord = dado.includes('Centroid Coordinates');

                let urlApp = dado.includes('Source URL');

                let tax = dado.includes('Tax Info URL');


                if (tax) {
                    taxinfo = dado.replace('Tax Info URL', '')
                }

                if (urlApp) {
                    appraiserUrl = dado.replace('Source URL', '');

                }

                if (coord) {

                    coordenadas = dado.replace('Centroid Coordinates', '');


                }

            }





            const urlRegrid = regrid_page.url();

            console.log(urlRegrid + '\n');

            console.log(appraiserUrl);


            await regrid_browser.close();




            const googleBrowser = await puppeter.launch({ headless: false });
            const googlePage = await googleBrowser.newPage()
            await googlePage.goto('https://www.google.com.br/maps');




            await googlePage.focus('input[name="q"]');





            await googlePage.keyboard.type(coordenadas);

            await googlePage.keyboard.press('Enter');

            await googlePage.waitForNavigation();


            await googlePage.waitForSelector('.DkEaL');

            const addresGoogle = await googlePage.$eval('.DkEaL', el => el.textContent);

            console.log(addresGoogle);


            //  const addresGoogle = await element.evaluate(el => el.textContent);

            const urlGoogle = googlePage.url();

            googleBrowser.close();







            //feema

            const femaBrowser = await puppeter.launch({ headless: false });

            const femaPage = await femaBrowser.newPage()

            const addresFema = 'https://msc.fema.gov/portal/search?AddressQuery=' + addresGoogle;



            await femaPage.goto(addresFema);



            //await femaPage.waitForSelector('#txtfloodmapsearch');

            //await femaPage.type('#txtfloodmapsearch', 'times square');

            //await femaPage.keyboard.press('Enter');

            // url do google 
            const urlFema = femaPage.url();
            console.log(urlFema);


            femaBrowser.close();


            const date = new Date();

            const dataUP =
                date.getMonth() + 1 + "/" + date.getDate() + "/" + date.getFullYear();






            const connection = mysql.createConnection({
                host: 'appraiser.mysql.dbaas.com.br',
                user: 'appraiser',
                password: 'M@r1@He1en@',
                database: 'appraiser'
            });



            let stmt = `INSERT INTO apps ( parcel ,flood,auction, regridUrl, aprraisalUrl, google, minimo , observacao , dataUp ,status)  VALUES ?`;
            let todos = [
                [
                    regridSearched,
                    urlFema,
                    "17",
                    urlRegrid,
                    appraiserUrl,
                    urlGoogle,
                    minimo,
                    taxinfo,
                    dataUP,
                    `1`,
                ],
            ];


            connection.query(stmt, [todos], (err, results, fields) => {
                if (err) {
                    return console.error(err.message);
                }
                // get inserted rows
                console.log('Row inserted:' + results.affectedRows);
            });

            connection.end();







            resolve();

        } catch (error) {
            console.log(error)
        }




    });
}

async function processItems() {

    let key;

    console.log(dados);







    for (const dado of dados) {
        result = await processItem(dado[0], dado[1]);
        console.log(result);

    }


}




//console.log(dados.length);
processItems();

