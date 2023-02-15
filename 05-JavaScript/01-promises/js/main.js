const promise = new Promise(function(resolve, reject) {
    const rand = Math.random(); // [0, 1 [
    if (rand < 0.5) {
        resolve(rand); // La promesse est "résolue" (succès)
    } else {
        reject(rand); // La promesse est "rejetée" (échec)
    }
});

promise
    .then(function(result) {
        console.log('GAGNE ! nombre : ' + result);
    })
    .catch(function(error) {
        console.log('PERDU ! nombre : ' + error);
    });

/**
 * Cas d'utilisation : 
 *  - requête AJAX :envoyer une requête HTTP en javascript
 *  - promessification : transformer une fonction qui travaille avec des callback en promesse
 *        - géolocalisation
 *        - chargement dynamique de ressources (ex : script)
 */
