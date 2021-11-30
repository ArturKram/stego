$(() => {
    getDCH();
    getPodr();
    onClickSotr(1);

});

const getDCH = (e) => {
    $.ajax({
        type: "GET",
        url: `http://192.168.99.100:3000/api/baza_d`,
        dataType: `json`, 
        success: (data) => {
            let html = '';
            data.forEach((row) => {
                html += `<option value="${row.id_dezh}">${row.name_dezh}</option>`;  
            });
            document.querySelector("#sp_dezh").innerHTML = html;
        },
    });
};

const getPodr = (e) => {
    $.ajax({
        type: "GET",
        url: `http://192.168.99.100:3000/api/podr`,
        dataType: `json`, 
        success: (data) => {
            let html = '';
            data.forEach((row) => {
                html += `<option value="${row.id_podr}">${row.name_podr}</option>`;  
            });
            document.querySelector("#sp_podr").innerHTML = html;
            onClickSotr();
        },
    });
};



const onClickSotr = (id) => {
    $.ajax({
        type: "GET",
        url: `http://192.168.99.100:3000/api/sotr`,
        data:{id},
        dataType: `json`, 
        success: (data) => {
            let html = '';
            data.forEach((row) => {
                html += `<option value="${row.id_sotr}">${row.name_sotr}</option>`;  
            });
            console.log(html);
            document.querySelector("#sp_sotr").innerHTML = html;
            
        },
    });
};

document.querySelector("#sp_podr").addEventListener('change',(e) => {
    onClickSotr(e.target.value);
});