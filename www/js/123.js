let departmentsList = [];
let vzvodList = [];
const onClickButton = (e) => {
    $.ajax({
        type: "POST",
        url: `http://192.168.252.27/core/ajax.php`,
        data: {action: "get_kafedralist"},
        success: (data) => {
            Object.keys(data).forEach((key) => {
                departmentsList.push(data[key]);
            });
        },
        dataType: `json`
    });
    $.ajax({
        type: "GET",
        url: `http://192.168.252.27/core/ajax.php`,
        data: {action: "get_vzvodlist"},
        success: (data) => {
            Object.keys(data).forEach((key) => {
                vzvodList.push(data[key]);
            });
            const table = document.createElement(`table`);
            let str = ``, i = 0;
            vzvodList.forEach((vzvod) => {
                i++;
                str += `
<tr>
<td>${i}</td>
<td>${vzvod.gruppa_name}</td>
<td>${vzvod.gruppa_nomer_vzvoda}</td>
<td>${vzvod.specialnost_short_name}</td>
</tr>`;
            });
            $(`table`).html(str);

        },
        dataType: `json`
    });
};

$(`button`).on(`click`, onClickButton);
$(`mark`).on(`click`, onClickButton);
