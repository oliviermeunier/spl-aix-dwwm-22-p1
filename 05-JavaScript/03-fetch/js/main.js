fetch('https://baconipsum.com/api/?type=all-meat&paras=2&start-with-lorem=1')
    .then(function(httpResponse) {
        return httpResponse.json();
    })
    .then(function(data) {
        console.log(data);
    });

/**
 * @TODO : syntaxe async / await
 */