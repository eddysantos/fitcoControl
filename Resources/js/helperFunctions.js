function rip_date(date){
  c_date = new Date(date);

  f_date = [];

  //var year = c_date.getFullYear();
  //var month = c_date.getMonth() + 1;
  var day = c_date.getDate();

  f_date.dia = day;
  //f_date.mes = month;
  //f_date.year = year;

  return f_date;
}
