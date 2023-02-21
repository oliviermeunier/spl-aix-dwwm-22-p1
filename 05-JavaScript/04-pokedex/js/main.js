const STORAGE = {
  save: (key, data) => localStorage.setItem(key, JSON.stringify(data)),
  load: key => JSON.parse(localStorage.getItem(key))
};

async function fetchPokemons()
{
  const response = await fetch('https://pokeapi.co/api/v2/pokemon?limit=9999');
  const data = await response.json();
  return data.results;
}

async function getPokemons()
{
  let pokemons = STORAGE.load('pokemons');
  if (pokemons == null) {
    pokemons = await fetchPokemons();
    STORAGE.save('pokemons', pokemons);
  }
  return pokemons;
}

function onInputSearch(event)
{
  const searchQuery = event.currentTarget.value;
  const results = pokemons.filter(pokemon => pokemon.name.startsWith(searchQuery));
  displayResults(results);
}

function displayResults(results)
{
  container.innerHTML = '';
  for (const pokemon of results) {
    container.innerHTML += `<p class="result-item">
                              <a href="${pokemon.url}">${pokemon.name}</a>
                            </p>`;
  }
}

async function onClickContainer(event)
{
  const target = event.target;
  if(target.matches('p.result-item a')) {
    event.preventDefault();
    const url = target.href;
    const response = await fetch(url);
    const pokemon = await response.json();
    displayPokemon(pokemon);
  }
}

function displayPokemon(pokemon)
{
  pokemonImg.src = pokemon.sprites.front_default;
  pokemonCaption.textContent = pokemon.name;
  pokemonContainer.classList.remove('hidden');
}

async function init()
{
  pokemons = await getPokemons();
  searchField.addEventListener('input', onInputSearch);
  container.addEventListener('click', onClickContainer);
}

// CODE PRINCIPAL
const searchField = document.getElementById('search');
const container = document.getElementById('results-container');
const pokemonContainer = document.getElementById('pokemon-details');
const pokemonImg = pokemonContainer.querySelector('img');
const pokemonCaption = pokemonContainer.querySelector('figcaption');

let pokemons;
init();
