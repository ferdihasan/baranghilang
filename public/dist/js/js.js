
const onChangeStatus = () => {
    const status = document.getElementById('status');
    const takedate = document.getElementById('takedate');
    if (status.value === 'Belum diambil'){
        // console.log(document.getElementById('takedate'))
        takedate.readOnly = true;
        takedate.required = false;

    }else {
        // console.log(takedate)
        takedate.readOnly = false;
        takedate.required = true;

    }

    // if (takedate) { // Check if takedate exists
    //     if (status.value === 'Belum diambil') {
    //         takedate.readOnly = true;
    //     } else {
    //         takedate.readOnly = false;
    //     }
    // } else {
    //     console.error("Element with ID 'datetime' not found.");
    // }
}

const description = document.getElementById('description');
// let des_barang;
function onLoadDataDescription(data){
    // des_barang = data;
    description.value = data;
}