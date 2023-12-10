const mysql = require('mysql2');
 

const connection = mysql.createConnection({
    host: 'appraiser.mysql.dbaas.com.br',
    user: 'appraiser',
    password: 'M@r1@He1en@',
    database: 'appraiser'
});

let stmt = `INSERT INTO apps ( appsApraiser, appsRegrid, status)  VALUES ?`;
let todos = [
    ['appraiser a', 'appraiser b', '1']
]



connection.query(stmt, [todos], (err, results, fields) => {
    if (err) {
        return console.error(err.message);
    }
    // get inserted rows
    console.log('Row inserted:' + results.affectedRows);
});

connection.end();
