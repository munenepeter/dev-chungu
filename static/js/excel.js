let selectedFile;
document.getElementById('inputfile').addEventListener("change", (event) => {
    selectedFile = event.target.files[0];
});

document.getElementById('button').addEventListener("click", () => {
    let excelData = parseExcel(selectedFile);
    console.log(parseExcel(selectedFile));
    document.getElementById("jsondata").innerHTML = JSON.stringify(excelData, undefined, 4);
});

function postData(datajson) {
    axios.post('projects/jwg/excel-to-json', {
            datajson
        }, {
            headers: {
                'Content-Type': 'application/json',
                "Access-Control-Allow-Headers": "Content-Type"
            }
        })
        .then(function (response) {
            console.log(response);
            document.getElementById("response").innerHTML = response.data;
        })
        .catch(function (error) {
            console.log(error);
        });
}

function parseExcel(selectedFile) {
    if (selectedFile) {
        var datajson = [];
        let fileReader = new FileReader();
        fileReader.readAsBinaryString(selectedFile);
        fileReader.onload = (event) => {
            let data = event.target.result;
            let workbook = XLSX.read(data, {
                type: "binary"
            });
            //console.log(workbook);

            var name = selectedFile.name; //filename with .xlsx
            var fullname = name.replace(".xlsx", ""); //filename without .xlsx

            datajson.push(fullname);

            workbook.SheetNames.forEach(sheet => {
                let rowObject = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheet]);
                datajson.push(rowObject);
                return datajson;
            });

        }

    }
}