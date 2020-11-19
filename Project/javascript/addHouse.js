function getFormValue(form, fieldName) {
    return form.elements[fieldName].value;
}

function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&')
}

let houseForm = getElementById('house-form');

houseForm.addEventListener('submit', (e) => {
    e.preventDefault();

    let title = getFormValue(houseForm, 'title');
    let pricePerNight = getFormValue(houseForm, 'pricePerNight');
    let area = getFormValue(houseForm, 'area');
    let address = getFormValue(houseForm, 'address');
    let capacity = getFormValue(houseForm, 'capacity');
    let description = getFormValue(houseForm, 'description');

    let request = new XMLHttpRequest();
    request.open('post', )
});