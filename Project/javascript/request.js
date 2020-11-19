function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&')
}

function makeReqest(url, method, successCallback, object) {
    let request = new XMLHttpRequest();

    let isPost = method === 'post';
    
    let address = isPost ? url : url + '?' + encodeForAjax(object);

    request.open(method, address, true);
    request.addEventListener('load', successCallback);

    if (isPost) {
      request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    }
    
    request.send(isPost ? encodeForAjax(object) : null);
}