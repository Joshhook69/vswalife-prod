function generate_pdc() {
  $.getJSON('/assets/js/pdc_template.json' + noCacheStr(), function(data) {
    const mapObj = getMapObj();
    if (mapObj == null) return;

    const airport = mapObj['{dep}'];
    let template;

    const top_alt_check = document.getElementById('top_alt_check').checked;
    const no_sid_check = document.getElementById('no_sid_check').checked;

    if (typeof data[airport] == 'undefined') {
      template = top_alt_check ? data.DEFAULT.maintain : data.DEFAULT.climb_via;
    }
    else if (no_sid_check && data[airport].no_sid != 'undefined') {
      template = data[airport].no_sid;
    }
    else {
      template = top_alt_check ? data[airport].maintain : data[airport].climb_via;
    }
    const pdc = replaceAll(template, mapObj)
    document.getElementById('pdc_preview').innerHTML = pdc;
    copyStringToClipboard(pdc);
  });
}

function format_route(route) {
  if (route.charAt(0) == '+')
    route = route.substring(1);
  return route.replace(/DCT /g, '');
}

function format_date(num) {
  return (num < 10 ? '0' : '') + num;
}

function format_time(num) {
  return (num < 1000 ? '0' : '') + num;
}

function copyStringToClipboard (str) {
  var el = document.createElement('textarea');
  el.value = str;
  el.setAttribute('readonly', '');
  el.style = {position: 'absolute', left: '-9999px'};
  document.body.appendChild(el);
  el.select();
  document.execCommand('copy');
  document.body.removeChild(el);
}

function offsetDate(offset) {
  curr_date = new Date();
  return new Date(curr_date.getTime() + offset*60000);
}

function replaceAll(str, mapObj){
  var re = new RegExp(Object.keys(mapObj).join("|"),"gi");

  return str.replace(re, function(matched){
      return mapObj[matched.toLowerCase()];
  });
}

function getMapObj() {
  const callsign = document.getElementById('callsign').value.toUpperCase();
  const dep_freq = document.getElementById('dep_freq').value;
  const beacon = document.getElementById('beacon').value;
  const gnd_freq = document.getElementById('gnd_freq').value;

  const flight_data_str = data.match(callsign + ':(.*?)(?=[\n\r])');

  if (flight_data_str == null) {
    alert('Flight not found');
    return null;
  }

  flight_data = flight_data_str[1].split(':');

  const date = new Date();

  const dep_ICAO = flight_data[10];
  const arr_ICAO = flight_data[12];
  const type = flight_data[8];
  const cruise = flight_data[11] / 100;
  const route = format_route(flight_data[29]);
  let remarks = flight_data[28].split('RMK/')[1];
  if (remarks != null)
    remarks = '@' + remarks;
  else
    remarks = '';
  const route_arr = route.split(' ');
  const sid = route_arr[0];
  const tran = route_arr[1];

  const p_time = format_time("" + offsetDate(20).getUTCHours() + offsetDate(20).getUTCMinutes());
  const utc_date = format_date(date.getUTCDate());

  const top_alt = document.getElementById('top_alt').value;

  return {
    "{callsign}": callsign,
    "{date}": utc_date,
    "{dep}": dep_ICAO,
    "{arr}": arr_ICAO,
    "{type}": type,
    "{cruise}": cruise,
    "{remarks}": remarks,
    "{route}": route,
    "{sid}": sid,
    "{tran}": tran,
    "{p_time}": p_time,
    "{top_alt}": top_alt,
    "{dep_freq}": dep_freq,
    "{beacon}": beacon,
    "{gnd_freq}": gnd_freq
  }
}