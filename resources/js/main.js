

$(document).ready(function(){
      // check if there's a logged in user

  
  $(function(){
    if(location.pathname.split("/")[3]){
      $('li a.nav-link[href$="/' + location.pathname.split("/")[2] + "/"+ location.pathname.split("/")[3] +'"]').addClass('active');
    }else{
      $('li a.nav-link[href$="/' + location.pathname.split("/")[2] + '"]').addClass('active');
    }
  });



  $('#validatedCustomFile').on('change',function(){
      //get the file name

      var fileName = $(this).val().split('\\');
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName[fileName.length-1]);
    });
  //MARKETING & STRATEGY

  //Target Market
  
  $('#total_tm').keyup(function(){
  funneling();
    
  });
  $('#percent1').keyup(function(){
  funneling();
  });
  $('#percent2').keyup(function(){
  funneling();
  });
  $('#percent3').keyup(function(){
  funneling();
  });
  function funneling(){
    let total_tm = $('#total_tm').val();
    let percent1 = $('#percent1').val();
    let percent2 = $('#percent2').val();
    let percent3 = $('#percent3').val();

    
    $("#p1").html(percent1);
    $("#p2").html(percent2);
    $("#p3").html(percent3);

    $("#pl1").html(parseInt(total_tm)+((percent1/100)*parseInt(total_tm)));
    
    let people2 = $('#pl1').html();
    $("#pl2").html(parseInt(people2)+((percent2/100)*parseInt(people2)));
    
    let people3 = $('#pl2').html();
    $("#pl3").html(parseInt(people3)+((percent3/100)*parseInt(people3)));

  }
  funneling();


  $('.btn-tgt-delete').click(function(){
    let tgtdelete = $(this).data('url');
    $("#title-modal").html($(this).data('title_modal'));
    $("#tgt-delete").attr('action',tgtdelete);
  });


  $('.btn-funnel').click(function(){
    let total_tm = $(this).data('total_people');
    let brand = $(this).data('brand');
    let market = $(this).data('market');
    let selling = $(this).data('selling');
    let created = $(this).data('created');
    $("#p1-view").html(brand);
    $("#p2-view").html(market);
    $("#p3-view").html(selling);
    $("#date_created").html(created);
    $("#pl1-view").html(parseInt(total_tm)+((brand/100)*parseInt(total_tm)));
    let people2 = $('#pl1-view').html();
    $("#pl2-view").html(parseInt(people2)+((market/100)*parseInt(people2)));
    let people3 = $('#pl2-view').html();
    $("#pl3-view").html(parseInt(people3)+((selling/100)*parseInt(people3)));
    $("#tgt-delete").attr('action',tgtdelete);
  });

  $('.btn-tgt-edit').click(function(){
    let tgtedit = $(this).data('url');
    let nama = $(this).data('nama');
    let nickname = $(this).data('nickname');
    let birth_date = $(this).data('birth');
    let origin_city = $(this).data('city');
    let domicile = $(this).data('domicile');
    let job = $(this).data('job');
    let education = $(this).data('education');
    let institution = $(this).data('institution');
    let religion = $(this).data('religion');
    let phone = $(this).data('hp');
    let email = $(this).data('email');
    let id_line = $(this).data('line');
    let id_instagram = $(this).data('instagram');
    let note = $(this).data('note');
    $('input[name="nama_edit"]').val(nama);
    $('input[name="nickname_edit"]').val(nickname);
    $('input[name="birth_date_edit"]').val(birth_date);
    $('input[name="origin_city_edit"]').val(origin_city);
    $('input[name="domicile_edit"]').val(domicile);
    $('input[name="job_edit"]').val(job);
    $('input[name="education_edit"]').val(education);
    $('input[name="institution_edit"]').val(institution);
    $('input[name="religion_edit"]').val(religion);
    $('input[name="phone_edit"]').val(phone);
    $('input[name="email_edit"]').val(email);
    $('input[name="id_line_edit"]').val(id_line);
    $('input[name="id_instagram_edit"]').val(id_instagram);
    $('textarea[name="note_edit"]').val(note);
    $("#tgt-edit").attr('action',tgtedit);
  });

  $('#targetmarket').DataTable();
  //Potential Market
  $('.btn-ptn-edit').click(function(){
    let ptnedit = $(this).data('url');
    let nama = $(this).data('nama');
    let phone = $(this).data('hp')
    let email = $(this).data('email');
    let address = $(this).data('address');
    let contacted = $(this).data('contacted');
    let result = $(this).data('result');
    let note = $(this).data('note');
    $('input[name="nama_edit"]').val(nama);
    $('input[name="hp_edit"]').val(phone);
    $('input[name="email_edit"]').val(email);
    $('textarea[name="address_edit"]').val(address);
    $('input[name="contacted_edit"][value="'+contacted+'"]').prop("checked",true);
    $('input[name="result_edit"][value="'+result+'"]').prop("checked", true);
    $('textarea[name="note_edit"]').val(note);
    $("#ptn-edit").attr('action',ptnedit);
  });
  $('.btn-ptn-delete').click(function(){
    let ptndelete = $(this).data('url');
    $("#ptn-delete").attr('action', ptndelete);
  });

  $('#potentialmarket').DataTable({
    "columns":[
    null,
    null,
    null,
    null,
    {"width": "30px"},
    {"width": "40px"},
    null,
    null
    ]
  });

  //LEVERAGE
  $('#leverage_list').on('change',function(){
    let leverage_list = $(this).val();
    if(leverage_list=="1"){
      $("#institute_item").removeClass('d-none');
      $("#people_item").addClass('d-none');
      $("#media_item").addClass('d-none');
      $("#influencer_item").addClass('d-none');
    }
    else if(leverage_list=="2"){
      $("#people_item").removeClass('d-none');
      $("#institute_item").addClass('d-none');
      $("#media_item").addClass('d-none');
      $("#influencer_item").addClass('d-none');
    }
    else if(leverage_list=="3"){
      $("#media_item").removeClass('d-none');
      $("#institute_item").addClass('d-none');
      $("#people_item").addClass('d-none');
      $("#influencer_item").addClass('d-none');
    }
    else if(leverage_list=="4"){
      $("#influencer_item").removeClass('d-none');
      $("#institute_item").addClass('d-none');
      $("#people_item").addClass('d-none');
      $("#media_item").addClass('d-none');
    }
  });    


  $('#leverage').DataTable();
  //institute
  $('.btn-lvg-institute-edit').click(function(){
    let lvginstituteedit = $(this).data('url');
    let institute = $(this).data('institute');
    let address = $(this).data('address');
    let total_student = $(this).data('total_student');
    let visited = $(this).data('visited');
    let date = $(this).data('date');
    let note = $(this).data('note');
    $('input[name="institute_name_edit"]').val(institute);
    $('input[name="institute_address_edit"]').val(address);
    $('input[name="institute_total_student_edit"]').val(total_student);
    $('input[name="institute_date_edit"]').val(date);
    $('input[name="institute_visited_edit"][value="'+visited+'"]').prop("checked",true);
    $('input[name="institute_note_edit"]').val(note);
    $("#lvg-institute-edit").attr('action',lvginstituteedit);
  });

  $('.btn-lvg-institute-delete').click(function(){
    let lvginstitutedelete = $(this).data('url');
    let data_id = $(this).data('id');
    $('input[name="delete_id"]').val(data_id);
    $("#lvg-institute-delete").attr('action', lvginstitutedelete);
  });
  //people
  $('.btn-lvg-people-edit').click(function(){
    let lvgpeopleedit = $(this).data('url');
    let jobdesc = $(this).data('jobdesc');
    $('input[name="people_jobdesc_edit"]').val(jobdesc);
    $("#lvg-people-edit").attr('action',lvgpeopleedit);
  });

  $('.btn-lvg-people-delete').click(function(){
    let lvgpeopledelete = $(this).data('url');
    let data_id = $(this).data('id');
    $('input[name="delete_id"]').val(data_id);
    $("#lvg-people-delete").attr('action', lvgpeopledelete);
  });

  //media
  $('.btn-lvg-media-edit').click(function(){
    let lvgmediaedit = $(this).data('url');
    let name = $(this).data('name');
    let address = $(this).data('address');
    let total_viewer = $(this).data('total_viewer');
    let cooperate = $(this).data('cooperate');
    let date = $(this).data('date');
    let note = $(this).data('note');
    $('input[name="media_name_edit"]').val(name);
    $('input[name="media_address_edit"]').val(address);
    $('input[name="media_total_viewer_edit"]').val(total_viewer);
    $('input[name="media_date_edit"]').val(date);
    $('input[name="media_cooperate_edit"][value="'+cooperate+'"]').prop("checked",true);
    $('input[name="media_note_edit"]').val(note);
    $("#lvg-media-edit").attr('action',lvgmediaedit);
  });

  $('.btn-lvg-media-delete').click(function(){
    let lvgmediadelete = $(this).data('url');
    let data_id = $(this).data('id');
    $('input[name="delete_id"]').val(data_id);
    $("#lvg-media-delete").attr('action', lvgmediadelete);
  });

   //influencer
   $('.btn-lvg-influencer-edit').click(function(){
    let lvginfluenceredit = $(this).data('url');
    let name = $(this).data('name');
    let address = $(this).data('address');
    let total_viewer = $(this).data('total_viewer');
    let cooperate = $(this).data('cooperate');
    let date = $(this).data('date');
    let note = $(this).data('note');
    $('input[name="influencer_name_edit"]').val(name);
    $('input[name="influencer_address_edit"]').val(address);
    $('input[name="influencer_total_viewer_edit"]').val(total_viewer);
    $('input[name="influencer_date_edit"]').val(date);
    $('input[name="influencer_cooperate_edit"][value="'+cooperate+'"]').prop("checked",true);
    $('input[name="influencer_note_edit"]').val(note);
    $("#lvg-influencer-edit").attr('action',lvginfluenceredit);
  });


   $('.btn-lvg-influencer-delete').click(function(){
    let lvginfluencerdelete = $(this).data('url');
    let data_id = $(this).data('id');
    $('input[name="delete_id"]').val(data_id);
    $("#lvg-influencer-delete").attr('action', lvginfluencerdelete);
  });

  //ACADEMIC
  //Student
  $('.btn-student-edit').click(function(){
    let studentedit = $(this).data('url');
    let name = $(this).data('name');
    let address = $(this).data('address')
    let classes = $(this).data('class');
    $('input[name="name_edit"]').val(name);
    $('input[name="address_edit"]').val(address);
    $('select[name="class_edit"]').val(classes);
    $("#student-edit").attr('action',studentedit);
  });
  $('.btn-student-delete').click(function(){
    let studentdelete = $(this).data('url');
    $("#student-delete").attr('action', studentdelete);
  });

  $('#student').DataTable();
  //CLASS
  $('.btn-class-edit').click(function(){
    let classedit = $(this).data('url');
    let class_name = $(this).data('name');
    $('input[name="class_edit"]').val(class_name);
    $("#class-edit").attr('action',classedit);
  });
  $('.btn-class-delete').click(function(){
    let classdelete = $(this).data('url');
    $("#class-delete").attr('action', classdelete);
  });

  $('#class_setting').DataTable();
  //materi
  $('.btn-materi-delete').click(function(){
    let materidelete = $(this).data('url');
    $("#materi-delete").attr('action', materidelete);
  });

  $('#materi').DataTable();

  
  //other materi
  $('.btn-other-delete').click(function(){
    let otherdelete = $(this).data('url');
    $("#other-delete").attr('action', otherdelete);
  });



  //HR
  $('.btn-staff-edit').click(function(){
    let staffedit = $(this).data('url');
    let name = $(this).data('nama');
    let address = $(this).data('address')
    let hp = $(this).data('hp');
    let position = $(this).data('position');
    let cv = $(this).data('cv');
    $('input[name="name_edit"]').val(name);
    $('input[name="address_edit"]').val(address);
    $('input[name="hp_edit"]').val(hp);
    $('textarea[name="position_edit"]').val(position);
    //var fileName = $('#validatedCustomFile2').val().split('\\');
    //replace the "Choose a file" label
    $('#validatedCustomFile2').next('.custom-file-label').html(cv);
    $('#validatedCustomFile2').on('change',function(){
      var fileName = $(this).val().split('\\');
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName[fileName.length-1]);
    });
    $("#staff-edit").attr('action',staffedit);
  });
  $('.btn-staff-delete').click(function(){
    let staffdelete = $(this).data('url');
    $("#staff-delete").attr('action', staffdelete);
  });
  $('.btn-staff-cv').click(function(){
    let cv_file = $(this).data('url');
    $('#cv_file').attr('src', cv_file);
  });
  $('#staff').DataTable();

  //TEACHER
  $('.btn-teacher-edit').click(function(){
    let teacheredit = $(this).data('url');
    let name = $(this).data('nama');
    let address = $(this).data('address')
    let hp = $(this).data('hp');
    let cv = $(this).data('cv');
    $('input[name="name_edit"]').val(name);
    $('input[name="address_edit"]').val(address);
    $('input[name="hp_edit"]').val(hp);
    $('#validatedCustomFile2').next('.custom-file-label').html(cv);
    $('#validatedCustomFile2').on('change',function(){
      var fileName = $(this).val().split('\\');
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName[fileName.length-1]);
    });
    $("#teacher-edit").attr('action',teacheredit);
  });
  $('.btn-teacher-delete').click(function(){
    let teacherdelete = $(this).data('url');
    $("#teacher-delete").attr('action', teacherdelete);
  });
  $('.btn-teacher-cv').click(function(){
    let cv_file = $(this).data('url');
    $('#cv_file').attr('src', cv_file);
  });
  $('#teacher').DataTable();

  //FINANCE
 //CASHFLOW

  $('.btn-cashflow-edit').click(function(){
    let cashflowedit = $(this).data('url');
    let date = $(this).data('date');
    let transaction = $(this).data('transaction');
    let nominal = $(this).data('nominal');
    let d_k = $(this).data('d_k');
    let id_category = $(this).data('category');
    $('input[name="date_edit"]').val(date);
    $('input[name="transaction_edit"]').val(transaction);
    $('input[name="nominal_edit"]').val(nominal);
    $('select[name="d_k_edit"]').val(d_k);
    $('select[name="category_edit"]').val(id_category);
    $("#cashflow-edit").attr('action',cashflowedit);
  });  
  $('.btn-cashflow-delete').click(function(){
    let cashflowdelete = $(this).data('url');
    $("#cashflow-delete").attr('action', cashflowdelete);
  });


  $("#month").change(function(){
    defaultToZeroMonthly();
    getDataMonthly();
    getDataMonthNominal();
  });
  $("#year").change(function(){
    defaultToZeroMonthly();
    getDataMonthly();
    getDataMonth();
    getDataMonthNominal();
  });
  $("#detailMonthly").change(function(){
    defaultToZeroMonthly();
    getDataMonthly();
    getDataMonth();
    getDataMonthNominal();
  });
  $("#detailAnnual").change(function(){
    getDataAnnual();
  });

  function defaultToZeroMonthly(){
    $.ajax({
      dataType: 'json',
      type: 'GET',
      url: '/category',
    }).done(function(data){
      data = data.data      
      let category="", nominal="";
      for (var i in data){
        category +=`<span id="${data[i].nama}" class="border-right pr-2 mr-2">${data[i].nama} 0%</span>`
        nominal += `<span id="${data[i].nama}1" >${data[i].nama} 0</span><br>`
      }
      $("#category").html(category);
      $("#detailMonthly").html(nominal+`<hr> <span id="total">Total </span>`);
      for (var i in data){
        $("#"+data[i].nama).html(data[i].nama+" 0%");
        $("#"+data[i].nama+"1").html(data[i].nama+" 0");
        $("#total").html(" 0");
      }
      for ( var i=0; i<12; i++){
        $("#month option[value="+(i+1)+"]").addClass('d-none');
      }
    });
  }
  function getDataMonth(){
    $.ajax({
      dataType: 'json',
      type: 'GET',
      url: '/monthly/'+$("#year").val(),
    }).done(function(data){
      data = data.data
      for (var i in data){
        $("#month option[value="+data[i].date+"]").removeClass('d-none');
      }
    });
  }
  defaultToZeroMonthly();
  getDataAnnual();
  getDataMonth();
  getDataMonthly();
  getDataMonthNominal();

  function getDataMonthNominal(){
    $.ajax({
      dataType: 'json',
      type: 'GET',
      url: '/monthly/'+$("#year").val()+'/'+$("#month").val(),
    }).done(function(data){
      data = data.data
      let nominal=[], category=[], sumNominal=0;
      for (var i in data){
        nominal.push(data[i].nominal);
        category.push(data[i].category);
        sumNominal += parseInt(data[i].nominal);
      }
      for ( var i in category){
        $("#"+category[i]+"1").html(category[i]+" "+nominal[i]);
      }
      $("#totalMonthly").html("Total : "+sumNominal);
    });
  }
  var Monthly;
  function getDataMonthly(){
    $.ajax({
      dataType: 'json',
      type: 'GET',
      url: '/monthly/'+$("#year").val()+'/'+$("#month").val(),
    }).done(function(data){
      sumTotal = 0;
      data = data.data;
      //standard = data;
      let nominal=[], category=[], persen=[];
      for (var i in data) {
        nominal.push(data[i].nominal);
        category.push(data[i].category);
        sumTotal+=parseInt(data[i].nominal);
      }
      for (var i in nominal) {
        persen.push(Math.round(parseInt(nominal[i])/sumTotal*100));
      }

      for(var i in category){
        $("#"+category[i]).html(category[i]+" "+persen[i]+" %")
      }
      if(document.getElementById('Monthly')){       
        var ctx = document.getElementById('Monthly').getContext('2d');
        if (Monthly){
          Monthly.destroy();
        }
        Monthly = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: category,
            datasets: [{
              label: '# of Nominal',
              data: nominal,
              backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            }
          }
        });
      }
    });
  }

  getDataAnnual();

  function getDataAnnual(){
   $.ajax({
    dataType: 'json',
    type: 'GET',
    url: '/annual/',
  }).done(function(data){
    data = data.data;
    let year="", nominal=[], date=[], sumNominal=0;
    for (var i in data) {
      nominal.push(data[i].nominal);
      date.push(data[i].date);
      year+=`<span id="${data[i].date}">Tahun ${data[i].date} : Rp. ${data[i].nominal}</span><br>`
      sumNominal += parseInt(data[i].nominal);
    }
    $("#detailAnnual").html(`${year}<hr> <span id="totalAnnual">Total Rp. ${sumNominal}</span><br>`);   
    if(document.getElementById('Annual')){       
      var ct = document.getElementById('Annual').getContext('2d');
      var Annual = new Chart(ct, {
        type: 'bar',
        data: {
          labels: date,
          datasets: [{
            label: '# of Nominal',
            data: nominal,
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
    }
  });
}

$('#cashflow').DataTable();
/*PAYMENT*/


$('.btn-payment-delete').click(function(){
  let paymentdelete = $(this).data('url');
  $("#payment-delete").attr('action', paymentdelete);
});

$(".btn-add-program").click(function(){
  var html = $(".copy-input-program").html();
  $(".copy-input-program").before(html);
});

$("body").on("click",".btn-remove-program", function(){
  $(this).parents(".control-program").remove();
});

$(".btn-add-payment").click(function(){
  var html = $(".copy-input-payment").html();
  $(".copy-input-payment").before(html);
});

$("body").on("click",".btn-remove-payment", function(){
  $(this).parents(".control-payment").remove();
});
/////////////////////////////EDIT
$(".btn-add-program-edit").click(function(){
  var html = $(".copy-input-program-edit").html();
  $(".copy-input-program-edit").before(html);
});

$("body").on("click",".btn-remove-program-edit", function(){
  $(this).parents(".control-program-edit").remove();
});

$(".btn-add-payment-edit").click(function(){
  var html = $(".copy-input-payment-edit").html();
  $(".copy-input-payment-edit").before(html);
});

$("body").on("click",".btn-remove-payment-edit", function(){
  $(this).parents(".control-payment-edit").remove();
});
//////////////////////DELETE
$('.btn-payment-delete').click(function(){
    let paymentdelete = $(this).data('url');
    $("#payment-delete").attr('action', paymentdelete);
});

$('#paymenttable').DataTable();

//PAYROLL
$('.btn-proll-delete').click(function(){
    let prolldelete = $(this).data('url');
    $("#proll-delete").attr('action', prolldelete);
});

$('.btn-proll-edit').click(function(){
  let prolledit = $(this).data('url');
  let date = $(this).data('date');
  let nama = $(this).data('id_hr');
  let score = $(this).data('score');
  let status = $(this).data('status');
  let note = $(this).data('note');
  let position = $(this).data('position');
  if(position=="teacher"){
    $("#teacher_item_edit").removeClass('d-none');
    $("#staff_item_edit").addClass('d-none');
    $('input[name="teacher_date_edit"]').val(date);
    $('select[name="teacher_nama_edit"]').val(nama);
    $('select[name="teacher_status_edit"]').val(status);
    $('input[name="teacher_score_edit"]').val(score);
    $('textarea[name="teacher_note_edit"]').val(note);
  }
  else {
    $("#staff_item_edit").removeClass('d-none');
    $("#teacher_item_edit").addClass('d-none');
    let total_work = $(this).data('total_work_day');
    $('input[name="staff_date_edit"]').val(date);
    $('select[name="staff_nama_edit"]').val(nama);
    $('select[name="staff_status_edit"]').val(status);
    $('input[name="staff_score_edit"]').val(score);
    $('input[name="staff_total_work_edit"]').val(total_work);
    $('textarea[name="staff_note_edit"]').val(note);
  }
  
  $('input[name="position_edit"]').val(position);
  $("#proll-edit").attr('action',prolledit);
});

 $('#position').on('change',function(){
    let position = $(this).val();
    if(position=="2"){
      $("#teacher_item").removeClass('d-none');
      $("#staff_item").addClass('d-none');
    }
    else {
      $("#staff_item").removeClass('d-none');
      $("#teacher_item").addClass('d-none');
    }
  });    

$('#payrollstaff').DataTable();
$('#payrollteacher').DataTable();

/*SETTING*/
/*PROGRAM*/
$('.btn-program-edit').click(function(){
  let programedit = $(this).data('url');
  let nama = $(this).data('nama');
  let cost = $(this).data('cost');
  $('input[name="name_edit"]').val(nama);
  $('input[name="cost_edit"]').val(cost);
  $("#program-edit").attr('action',programedit);
});
$('.btn-program-delete').click(function(){
  let programdelete = $(this).data('url');
  $("#program-delete").attr('action', programdelete);
});

$('#program').DataTable();

feather.replace();
});