const ftp = require("basic-ftp") 
// ESM: import * as ftp from "basic-ftp"

 
 

async function gravarFTP() {
    const client = new ftp.Client()
    client.ftp.verbose = true
    try {
        await client.access({
            host: "ftp.wmhtecnologia.com.br",
            user: "wmhtecnologia3",
            password: "M@r1@He1en@123",
            secure: false
        })
        console.log(await client.list("/public_html/appraiser/files"))
         await client.uploadFrom("01-12-317-002.pdf", "/public_html/appraiser/files/01-12-317-002.pdf")
      //  await client.downloadTo("README_COPY.md", "README_FTP.md")
    }
    catch(err) {
        console.log(err)
    }
    client.close()
}

 