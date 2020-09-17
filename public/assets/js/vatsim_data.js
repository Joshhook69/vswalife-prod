var url = 'https://cors-anywhere.herokuapp.com/http://us.data.vatsim.net/vatsim-data.txt' + noCacheStr();
// var url = 'vatsim-data.txt' + noCacheStr();
var data;

get_data();

function get_data() {
  fetch(url).then(response => {
    response.text().then(function(text) {
      data = text;
      done();
    });
  });
}

function done() {
  const last_update = data.match('Created at (.*) by Data Server')[1];
  document.getElementById('last_update').innerHTML = last_update;
}

function noCacheStr() {
  const date = new Date();
  return "?nocache=" + new Date().getTime();
}