// Déclaration de variables

let message = 'Bonjour';
const toto = 'toto';

// Types de données 

/**
 * string
 * number
 * boolean
 * null
 * undefined
 * object
 * symbol
 * bigInt
 */

let name = `${message} Alfred`;
name = message + ' ' + 'Alfred';

let age = 20;

if (age >= 18) {
    console.log('Vous êtes majeur');
} else {
    console.log('Vous êtes mineur');
}

switch(age) {
    case 20:
        // ...
        break;

    case 40:
        // ...
        break;

    default: 
        // ...

}

for (let i = 0; i < 10; i++) {
    console.log('Tour n°' + i);
}

let j = 0;

while(j < 10) {
    console.log('Tour n°' + j);
    j++;
}

/**
 * do {
 *  
 * } while(condition);
 */

let tab = [1,2,3];

tab.forEach(function (item) {
    console.log(item);
});

for (const item of tab) {
    console.log(item);
}

const person = {
    firstname: 'Alfred',
    lastname: 'Dupont',
    age: 30
};

for (const prop in person) {
    console.log(`${prop} : ${person[prop]}`)
}

const fruits = new Array('banane', 'fraise');

fruits.push('framboise');

// let x = 10;

function sayHello(name = 'world')
{
    const msg = 'Hello ' + name;

    // console.log(x);

    return msg;
}

// const sayHello = function (name = 'world') {
//     console.log('Hello ' + name);
// };

const result = sayHello(); // Hello world
const result2 = sayHello('Nicolas'); // Hello Nicolas
