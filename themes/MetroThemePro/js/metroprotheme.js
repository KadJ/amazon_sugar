var checktime=0;
var informodule="";
var infoid="";
var infoobject="";
var infosp=0;
var showsubpdiv='';
var createsubpdiv='';
var cmodule="";

function sethide_filters()
{
 $(".search_form").toggleClass("form_show");
}

function show_all()
{
  SUGAR.searchForm.clear_form(document.getElementById("search_form"));
  document.getElementById("search_form").submit();
}

function active_filters()
{
 var fil="";
 var strvalue="";
 var strlabel="";
 var strname="";  
 var modulo=$('#search_form input[name=module]').val();
   if($('#'+modulo+'basic_searchSearchForm').attr('style')==0)
   {
      _obj=$('#'+modulo+'basic_searchSearchForm');
      strname="_basic";
   }
   else
   {
      _obj=$('#'+modulo+'advanced_searchSearchForm'); 
      strname="_advanced";
   } 
   _obj.find('tr').each(function(index) { 
   $(this).find('td').each(function(index) { 
        if(index%2 == 0)
        {
         strlabel=$(this).text();
        }
        else        
        {
          if($(this).find('select[id*="_choice"]').length>0) 
          {
            $(this).find('input').each(function(index) { 
             if($(this).val()!='')
               strvalue+=$(this).val()+' ';
            }); 
            if((strvalue!='')&&($(this).find('select').attr('name')!=undefined))
            {
              if($(this).find('select').attr('name').indexOf(strname)>0)
              {
               if($(this).find('select').length>0)
                  strvalue=$(this).find('select option:selected').text()+' '+strvalue;
              }  
            }              
          }
          else
          {
              if($(this).find('input').attr('name')!=undefined)
              {
                if($(this).find('input').attr('name').indexOf(strname)>0)
                {
                 if($(this).find('input:text').length>0) 
                    strvalue=$(this).find('input:text').val();
                 if($(this).find('input:radio').length>0)
                    strvalue=$(this).find('input:radio').val();
                 if($(this).find('input:checkbox').length>0)
                   if($(this).find('input:checkbox').is(':checked'))
                     strvalue='Yes';
                }  
              } 
              if($(this).find('select').attr('name')!=undefined)
              {
                if($(this).find('select').attr('name').indexOf(strname)>0)
                {
                 if($(this).find('select').length>0)
                    strvalue=$(this).find('select option:selected').text();
                }  
              } 
          }
                                       
        }
        if((strvalue!="")&&(strvalue!=null))
        {
        if(fil.length+strvalue.length<220)
          fil+=" <b>"+strlabel+"</b>=\'"+strvalue+"\'"; 
        else
          fil+="... and more";
          strvalue="";
          strlabel="";
 
        }             
    });
 });
 return fil;
}


function clickall(){
  checktime=0;
  setsubpanelsheader1()    
} 

$(window).on('hashchange', function() {
   cmodule="";
   checktime=0;
   setTimeout(setsubpanelsheader1,500);  
});


function showsubp(info_id,info_module,targ_module,targ_rel)
{      
             var url='index.php?to_pdf=1&module=MySettings&action=LoadTabSubpanels&loadModule='+info_module+'&record='+info_id+'&subpanels=';
             $.ajax({
        				type: "GET",       				
                url: url,
         				async:false,
         				dataType: "html",                                             
        				success: function(data) {
                
                  var _data2='<ul class="noBullet ch" style="display:inline;">'+data+'</ul>';
      				    var obj=$(_data2).find('#subpanel_'+targ_rel);
                  if(obj.length==0)
                    {
                      var objrow=$('#'+infoobject).parent().parent();
                      objrow.addClass("previewcolor");
                      objrow.after('<tr id="previewsupanelrow"><td colspan=20 id="hack">'+SUGAR.language.get('app_strings', 'MSG_LIST_VIEW_NO_RESULTS_BASIC')+'</td></tr>');  
                      return;                 
                    }
                  $(obj).find('.pagination').remove();
                  $(obj).find('.list').find('tr:eq(0)').find('a').replaceWith(function(){
                      return $("<span>" + $(this).text() + "</span>");
                  });
                  $(obj).find('.sugar_action_button').remove();
                         
                  var strhtml='<tr id="previewsupanelrow"><td colspan=20 id="hack">'+obj.html()+'</td></tr>';
                  strhtml=strhtml.replace(/MySettings/g,info_module);  
                  strhtml=strhtml.replace(/height="20"/g,'height="10"'); 
                                
                  var objrow=$('#'+infoobject).parent().parent();
                  objrow.addClass("previewcolor");
                  objrow.after(strhtml);
                  
                }                                   
               });                                    
}                                        


function createsubp(info_id,info_module,targ_module,targ_rel)
{
   var url='index.php?to_pdf=1&module=MetroThemePro_mod&action=getrecordname&infomodule='+info_module+'&inforecord='+info_id;
   var recname;
     $.ajax({
  				type: "GET",       				
          url: url,
   				async:false,
   				dataType: "html",                                             
  				success: function(data) {
             recname=data; 
     }               
    });  
   var s_f="";
   if($('#subp_form').length==0)
   {
      s_f+='<form id="subp_form" method="post" action="index.php">';
      s_f+='<input type="hidden" value="" name="module">';
      s_f+='<input type="hidden" value="" name="record">';
      s_f+='<input type="hidden" value="EditView" name="action">';
      s_f+='<input type="hidden" value="" name="return_module">';
      s_f+='<input type="hidden" value="DetailView" name="return_action">';
      s_f+='<input type="hidden" value="" name="return_id">';
      s_f+='<input type="hidden" value="" name="relate_to">';
      s_f+='<input type="hidden" value="" name="relate_id">';
      s_f+='<input type="hidden" value="" name="parent_type">';
      s_f+='<input type="hidden" value="" name="parent_name">';
      s_f+='<input type="hidden" value="" name="parent_id">';
      s_f+='</form>';
   }
   $('#content').append(s_f);
   $('#subp_form input[name=module]').val(targ_module);
   $('#subp_form input[name=return_module]').val(info_module);
   $('#subp_form input[name=return_id]').val(info_id);
   $('#subp_form input[name=relate_to]').val(targ_rel);
   $('#subp_form input[name=relate_id]').val(info_id);
   $('#subp_form input[name=parent_id]').val(info_id);   
   $('#subp_form input[name=parent_type]').val(info_module);   
   $('#subp_form input[name=parent_name]').val(recname);   
   $('#subp_form').submit();
}

function goto_create(){
   var cp='';
   var m='';
   if((module_sugar_grp1!=undefined)&&(module_sugar_grp1!=''))
    { 
      cp='dv';
      m=module_sugar_grp1;
    }   
  if((cp=='')&&($('.list').length>0))
    { 
      cp='lv';
      m=$('#search_form input[name=module]').val();
    }       
   if((cp=='')&&($('.monthHeader').length>0))
    { 
      cp='';
      m=$('#formDetailView input[name=module]').val();
    }                          
    if(m=='')
      return;
    document.location.href='index.php?action=EditView&module='+m+'&return_action=DetailView';
} 


//*********************************
// SUBPANELS
//*********************************          

function setsubpanelsheader1(){

  if(($('.search_form').length>0)&&($('.moduleTitle').length>0))
  {  
    
    $('.list tr.oddListRowS1 td a[href*="'+$('.search_form input[name=module]').val()+'"], .list tr.evenListRowS1 td a[href*="'+$('.search_form input[name=module]').val()+'"]').css('font-size','16px');
    $('.list tr.oddListRowS1 td a[href*="'+$('.search_form input[name=module]').val()+'"], .list tr.evenListRowS1 td a[href*="'+$('.search_form input[name=module]').val()+'"]').css('font-weight','normal');
  
   if($('.search_form').find('input[name=module]').val()!=cmodule)
     if(($('.search_form').find('div.advanced').length>0)&&($('.search_form').find('div.basic').length>0))
      {
        strhtml='<h2>'+$('.moduleTitle > h2').text()+'</h2>';
        strhtml+='<div id="newsb" style="float:left;padding-left:30px;"><input type="button" value=" '+SUGAR.language.get('app_strings', 'LBL_SEARCH_CRITERIA')+' " id="setfilters" class="button" onclick="sethide_filters(); return false;" title="Set filters" tabindex="2">&nbsp;<input type="button" value="'+SUGAR.language.get('app_strings', 'LNK_SEARCH_NONFTS_VIEW_ALL')+'" id="search_form_clear" name="clear" class="button" onclick="show_all(); return false;" title="Clear" tabindex="2"></div>';  
        strhtml+='<div id="div_active_filters" style="float:left;padding-left:20px;">'+active_filters()+'</div>';
        strhtml+='<div id="div_create" style="float:right;padding-right:20px;"><input type="button" value=" '+SUGAR.language.get('app_strings', 'LNK_CREATE')+' " id="btncreate" class="button" onclick="document.location.href=\'index.php?module='+$('.search_form').find('input[name=module]').val()+'&action=EditView\';" title=""></div>';
        $('.moduleTitle').html(strhtml); 
        cmodule =$('.search_form').find('input[name=module]').val();
        return;
      }
      else
      {
         $("#search_form").css('display','block');
        return;     
      }                                   


  }     


// subpanels in detailview  
 if($('#subpanel_list').length>0)
  {
     setsubpanelsheader();
     return;  
  }


  setTimeout(setsubpanelsheader1,500);  
};



function setsubpanelsheader(){

$('#subpanel_list').css('visibility','visible');

  var grptab=document.getElementById('groupTabs');
  if(grptab)
  {
   return;
  } 
 
 var sp2 = document.getElementById('subpanel_list');
 var sp1 = document.createElement("ul");
 sp1.id="groupTabs";
 sp1.className="subpanelTablist";   
 var parentDiv = sp2.parentNode;
 parentDiv.insertBefore(sp1, sp2);
 grptab=sp1;
 $('#subpanel_list').find('.formHeader.h3Row').css('display','none');
      
 var tabspanel=$('#subpanel_list > li'); 
 var _subpanelid=getCookie($('#formDetailView').find('input[name=module]').val());
 if(_subpanelid=="")     
   _subpanelid='dummy-'+0;             

 for(i=0; i<tabspanel.length; i++)  {     
     if(i>0)
       tabspanel[i].style.display='none';  
            
      var tabstitles =tabspanel[i].getElementsByTagName('table');
      if (document.all) // IE Stuff
        {
         namesubpanel=tabstitles[0].innerText;                
        }   
        else // Mozilla does not work with innerText
        {
         namesubpanel=tabstitles[0].textContent;
        }
 
      var li = document.createElement('li');
      var a = document.createElement('a');
      a.href="#";
      a.id="dummy-"+i;
      a.name=tabspanel[i].id;
      a.innerHTML=namesubpanel;
      if('dummy-'+i==_subpanelid)
      {
        a.className ='activesubpanel';
      } 
      if (window.addEventListener) 
          {  
              a.addEventListener('click', function(){ 
                  var tabsp=document.getElementById('subpanel_list').childNodes; 
                  for(k=0; k<tabsp.length; k++)  {     
                      tabsp[k].style.display='none';
                  }
                  var tabspsub=document.getElementById('groupTabs').childNodes; 
           
                  document.getElementById(this.name).style.display='inline';
                  for(k=0; k<$('#groupTabs >li').length; k++)  
                     $('#groupTabs >li:eq('+k+') a').removeClass('activesubpanel');
                  document.getElementById(this.id).className ='activesubpanel';
                  
                  setCookie($('#formDetailView').find('input[name=module]').val(),this.id,100);   
                  
                  (arguments[0].preventDefault)? arguments[0].preventDefault(): arguments[0].returnValue = false;           
                  }, false); 
          } 
          else
          { 
             if (window.attachEvent) {  
              a.attachEvent('onclick',  function(){              
                  var tabsp=document.getElementById('subpanel_list').childNodes; 
                  for(k=0; k<tabsp.length; k++)  {     
                      tabsp[k].style.display='none';
                  }
                  var tabspsub=document.getElementById('groupTabs').childNodes; 
         
                  document.getElementById(this.name).style.display='inline';
                  for(k=0; k<$('#groupTabs >li').length; k++)  
                     $('#groupTabs >li:eq('+k+') a').removeClass('activesubpanel');                  
                  document.getElementById(this.id).className ='activesubpanel';
                  (arguments[0].preventDefault)? arguments[0].preventDefault(): arguments[0].returnValue = false;     
              } ); 
             } 
          }   
      li.appendChild(a);
      
      grptab.appendChild(li);
    }   
    if(_subpanelid!='dummy-0')
    {
      var tabsp=document.getElementById('subpanel_list').childNodes; 
      for(k=0; k<tabsp.length; k++)  {     
          tabsp[k].style.display='none';
      }
      var tabspsub=document.getElementById('groupTabs').childNodes;  
      document.getElementById(tabspanel[_subpanelid.replace('dummy-','')].id).style.display='inline';
    }
                           
}             
                                    
var TO = false;
$(function() 
{
    // hacking function for creating related records
    SUGAR.util.getAdditionalDetails = function(module,id,object){
      infoobject=object; 
      infomodule=module;
      infoid=id;  
     if($('.subpl').length>0)
      {
         $('.subpl').remove();
          infosp=2;      
      }
      else
      {
        infosp=1;      
      }
      return true;
    };  
    
    resetmenutop();
    
    // resize
    if($('.listViewBody').length>0)
    {
        $('.listViewBody').css({'height': (($(window).height()-130))+'px'});  
        $("body").css("overflow", "hidden");                 
    }

    $(window).resize(function(){
        if($('.listViewBody').length>0)
        {
            $('.listViewBody').css({'height': (($(window).height()-130))+'px'});
            $("body").css("overflow", "hidden");
        }

         if(TO !== false)
            clearTimeout(TO);
         TO = setTimeout(resetmenutop, 200);

    });       
    // sbupanel toolbar
    setsubpanelsheader1();
    
    // add bookmark to drop down menu
    readAllbookmark();
   
    //notifications
    readnotifications();
    

 
});        

        
$(document).click(function(e) {
  clickall();


  
    
 if((infosp==1)&&(infoid!=""))  
  {
        if($('.subpl').length>0)
        {
           $('.subpl').remove();
           infomodule="";
           infoid="";
           infoobject=""; 
           infosp=0;
           return;     
        }
        if($('#previewsupanelrow[data='+infoid+']').length>0)
          {
             $('#previewsupanelrow').remove();
             $('#previewrow').remove();
             $('.previewcolor').removeClass('previewcolor');  
             return;
          }
        if($('.previewcolor').length>0)
          {
           // if($('#previewsupanelrow').index()<trobj.index())
             //       trobj=trobj.prev();
             $('#previewsupanelrow').remove();
             $('#previewrow').remove();
             $('.previewcolor').removeClass('previewcolor'); 
             infomodule="";
             infoid="";
             infoobject=""; 
             infosp=0;
             return;             
          }                            
   var parentOffset = $('#'+infoobject).offset(); 
   var relX = e.pageX - parentOffset.left;
   if(relX>48) // quick create 
     {
     if(createsubpdiv=='')
       {
         var sth= '<div class="subpl">';
         sth+='<div class="padleft20" style="margin-bottom:10px;margin-top:10px;width:100%;float:left;text-align:left;font-weight:700;">'+SUGAR.language.get('app_strings', 'LBL_QUICK_CREATE_TITLE')+'</div>';;
         var  strsubplist='';
         var url='index.php?to_pdf=1&module=MetroThemePro_mod&infomodule='+infomodule+'&action=subpanel_all&inforecord='+infoid;   
         $.ajax({
      				type: "GET",       				
              url: url,
       				async:false,
       				dataType: "json",                                             
      				success: function(data) {
                 for(j=0;j<data.length;j++)     
                 {
                   strsubplist+='<div class="padleft20"><a href="#" onclick="createsubp(\''+infoid+'\',\''+infomodule+'\',\''+data[j].module+'\',\''+data[j].rel+'\');">'+data[j].module+'</a></div>';
                   createsubpdiv+='<div class="padleft20"><a href="#" onclick="createsubp(\'CURRENTID\'\',\''+infomodule+'\',\''+data[j].module+'\',\''+data[j].rel+'\');">'+data[j].module+'</a></div>';
                 }
                 $('#'+infoobject).append(sth+strsubplist+'</div>');
                 $('.info').css('border:1px solid #7D8CAB;border-bottom:none;');
             }
          });                            
          infomodule="";
          infoid="";
          infoobject=""; 
          infosp=0;  
        }  
       else
        {
             var tmp=createsubpdiv;
             tmp=tmp.replace(/CURRENTID/g, infoid);
             $('#'+infoobject).append(tmp);
             $('.info').css('border:1px solid #7D8CAB;border-bottom:none;');
        }
     } 
   if((relX>25)&&(relX<=48)) // show subpanels
     {
     if(showsubpdiv=='')
     {
       var sth= '<div class="subpl">';
       sth+='<div class="padleft20" style="margin-bottom:10px;margin-top:10px;width:100%;float:left;text-align:left;font-weight:700;">'+SUGAR.language.get('app_strings', 'LBL_ADDITIONAL_DETAILS')+'</div>';;
       var  strsubplist='';
       var url='index.php?to_pdf=1&module=MetroThemePro_mod&infomodule='+infomodule+'&action=subpanel_all&subp=true&inforecord='+infoid;   
       $.ajax({
    				type: "GET",       				
            url: url,
     				async:false,
     				dataType: "json",                                             
    				success: function(data) {
               for(j=0;j<data.length;j++)     
               {
                 strsubplist+='<div class="padleft20"><a href="#" onclick="showsubp(\''+infoid+'\',\''+infomodule+'\',\''+data[j].module+'\',\''+data[j].name+'\');">'+data[j].module+'</a></div>';
                 showsubpdiv+='<div class="padleft20"><a href="#" onclick="showsubp(\'CURRENTID\',\''+infomodule+'\',\''+data[j].module+'\',\''+data[j].name+'\');">'+data[j].module+'</a></div>';
               }
               $('#'+infoobject).append(sth+strsubplist+'</div>');
               $('.info').css('border:1px solid #7D8CAB;border-bottom:none;');
               showsubpdiv=sth+showsubpdiv+'</div>';
           }
        });                            
      }
      else
      {
           var tmp=showsubpdiv;
           tmp=tmp.replace(/CURRENTID/g, infoid);
           $('#'+infoobject).append(tmp);
           $('.info').css('border:1px solid #7D8CAB;border-bottom:none;');
      }
     } 
   if(relX<25) // dropdown
      {              
        var strlist='';  
        var mpreview='';  
        var strsubplist=''; 
                    
        var trobj=$('#'+infoobject).parent().parent();
        // subpanels
          if(show_related==true)
          {
           var url='index.php?to_pdf=1&module=MetroThemePro_mod&infomodule='+infomodule+'&action=subpanel_all&spl=1&inforecord='+infoid;   
           $.ajax({
        				type: "GET",       				
                url: url,
         				async:true,
         				dataType: "json",                                             
        				success: function(data) {
      
                   for(j=0;j<data.subp.length;j++)     
                   {
                     strsubplist+='<div class="padleft20"><a href="#" onclick="createsubp(\''+infoid+'\',\''+infomodule+'\',\''+data.subp[j].module+'\',\''+data.subp[j].rel+'\');">'+data.subp[j].module+'</a></div>';
                   }
                   if(data.subp.length>0)
                   {
               //       strlist+= '<div style="margin-top:15px;float:left;clear:both;width:100%;"><div class="padleft20">'+SUGAR.language.get('app_strings', 'LBL_QUICK_CREATE_TITLE')+':</div>'+strsubplist+'</div>';
                   }
                  //  strlist+= '<div class="clear"></div>';
                   for(j=0;j<data.list.length;j++)
                   {
                     strlist+='<div class="previewsupanel"><div class="notif_n"><a href="index.php?module='+data.list[j].module+'&amp;action=DetailView&amp;record='+data.list[j].id+'">'+data.list[j].name+'</a></div><div class="notif_subpan">'+data.list[j].module+'&nbsp;<a href="index.php?module=Users&amp;action=DetailView&amp;record='+data.list[j].user_id+'">'+data.list[j].user_name+'</a>&nbsp;'+data.list[j].date_modified+'</div></div>';                     
                   }
                if(mpreview=="-")
                { 
                   
                   trobj.after('<tr id="previewsupanelrow" data='+infoid+'><td colspan=20>'+strlist+'</td></tr>');    
                   infomodule="";
                   infoid="";  
                   infoobject="";  
                   infosp=0; 
      
                }
      
               }
            });  
         }  
          // HEADER 
           var url='index.php?to_pdf=1&module='+infomodule+'&action=DetailView&loadModule='+infomodule+'&record='+infoid;   
           $.ajax({
        				type: "GET",       				
                url: url,
         				async:true,
         				dataType: "html",                                             
        				success: function(data) {
                var _dat2=$('<form>'+data);
                _dat2.find('style').remove();
                _dat2.find('script').remove();
                var mlabel="";
                var mdata="";
                var ismore=false;
                var contdiv=0;
                _dat2.find(".panelContainer td[scope='col']").each(function(index) {   
                      mlabel=$(this).text().trim();
                      mdata=$(this).next().text().replace(/(\r\n|\n|\r)/gm,"");
                      var notfound=true;
                      trobj.parent().find('.pagination:eq(0)').next().find("th").each(function(index) {
                      if($(this).text().trim()+":"==mlabel)
                            notfound=false;
                      });
                      if(notfound)
                      {    
                          contdiv++;
                          if(mdata=="")
                          mdata='&nbsp;';
                          mpreview+="<div class='prevc'><div class='prevl'>"+mlabel+"</div><div class='prevd'>"+mdata+"</div></div>";  
                          if(contdiv==15)
                          {
                             mpreview+="<div class='divshowmore'>"; 
                             ismore=true;
                          } 
                     }     
                });  
                 if(ismore)                         
                  {
                    if(contdiv>5)
                       mpreview+="</div><div class='prevl' style='float:right;margin-top:15px;'><input type='button' value='"+SUGAR.language.get('app_strings', 'LBL_SHOW_MORE')+"' name='button' onclick='setshowmore();return false;' class='button primary' accesskey='a' id='labshowmore'></div>"; 
                    else
                       mpreview+="</div>";
                  }
       
       
               $('#previewsupanelrow').remove();
               $('#previewrow').remove();
               $('.previewcolor').removeClass('previewcolor'); 
          
       
               trobj.addClass("previewcolor");
               trobj.after('<tr  id="previewrow" data='+infoid+'><td colspan=20>'+mpreview+'</td></tr>');
               if(strlist!='')
               {
                   trobj=trobj.next();
                   trobj.after('<tr id="previewsupanelrow" data='+infoid+'><td colspan=20>'+strlist+'</td></tr>');
               }
               trobj=trobj.next();
               mpreview='-';
               if(infoobject=="")
               {
                   infomodule="";
                   infoid="";
                   infoobject=""; 
                   infosp=0;                      
               }
      
              }    
            });        
            
  }  
   
 } 
 
});





function resetmenutop()
{

  if($('.moremenu').length<=0)     
   return;
   
  var maxw=$('#moduleList').width();
  var tools_minw=470 //min width for right toolbar (search and...)
  var cw=0;
  var objar=[];
  if($('#moduleList>ul>li').find('#companylogo').length>0)
      tools_minw=500;
      

  $('#moduleList>ul>li:not(:last-child)').each(function(index) { 
      if(cw+$(this).width()>maxw-tools_minw)
      {
        objar.push($(this));
      }
      else
      {
        cw+=$(this).width();
      }
  });
  for(j=0;j<objar.length;j++)
  {
        objar[j].find('.arrowdown').css('display','none');
        objar[j].find('span').css('width','100%');
        $('.moremenu').prepend(objar[j]);
  }
  var cc= $('#moduleList>ul>li').length;
  while(cw+16+$('.moremenu>li:nth-child(1)').width()<maxw-tools_minw)
  {
    $('.moremenu>li:nth-child(1)').find('.arrowdown').css('display','block');
    $('.moremenu>li:nth-child(1)').find('span').css('width','auto');
    $('#moduleList>ul>li:nth-child('+cc+')').before($('.moremenu>li:nth-child(1)'));
    cw+=$('#moduleList>ul>li:nth-child('+cc+')').width();
    if(cw>=maxw-tools_minw)
    {
     $('.moremenu').prepend($('#moduleList>ul>li:nth-child('+cc+')'));
     $('.moremenu>li:nth-child(1)').find('.arrowdown').css('display','none');
     $('.moremenu>li:nth-child(1)').find('span').css('width','100%');
    }
  }
  $('#toptools').css('display','block');
}

function getuser(){
   var queryStringArray = $("#welcome_link").attr('href');
   var queryStringParamArray = queryStringArray.split("&");
   var nameValue = null;
   for ( var i=0; i<queryStringParamArray.length; i++ )
    {           
        queryStringNameValueArray = queryStringParamArray[i].split("=");

        if ( "record" == queryStringNameValueArray[0] )
        {
            nameValue = queryStringNameValueArray[1];
        }                       
    }
   return nameValue; 
}
                          
function readnotifications()
{
     
     if($('#notifications').length==0)  // disabled form admin setting
      return;
 
 
       var url='index.php?to_pdf=1&module=MetroThemePro_mod&action=getnotifications';   
       $.ajax({
    				type: "GET",       				
            url: url,
     				async:false,
     				dataType: "json",                                             
    				success: function(data) {  
             
 
            if(data.tot>0)
            {         
             $('#notifications').html('<span>'+data.tot+'</span>');  
               var strlist='';      
               for(j=0;j<data.notif_list.length;j++)
                {
                 strlist+='<li><a style="width:230px;" href="index.php?module='+data.notif_list[j].module+'&amp;action=DetailView&amp;record='+data.notif_list[j].id+'"><div class="notif_n">'+data.notif_list[j].name+'</div><div class="notif_d">'+data.notif_list[j].mod_name+'&nbsp;'+data.notif_list[j].date_modified+'</div></a></li>';
                }
              // if(data.tot>10)
             //  {
              //   strlist+='<li style="border-top:1px solid #CCC;"><a style="width:230px;" href="index.php?module=MetroThemePro_mod&amp;action=index"><div class="notif_n">'+SUGAR.language.get('app_strings', 'LBL_ASSIGNED_TO_NAME')+' ...</div></a></li>';
              // }
               $('#notifications').append('<ul><li><ul id="ultasks">'+strlist+'</li></ul></li></ul>');
               $('#ultasks>li').ellipsis();
              var wtemp=$('#ultasks').width()-20;
              $('#ultasks').css('left','-'+wtemp+'px');
            }
            else
            {
             $('#notifications').html('');
            } 
           } 
          });    
           
}



function closepreview()
{
    $('.moduleTitle').css({'width':'100%'});
    $('.listViewBody').css({'width':'100%'});                                      
    $('#divpreview').remove(); 
}

function setshowmore()
{
  infosp=2;
  if($('#labshowmore').length==0)
    return;
  
  if($('.divshowmore').css('display')=='none')
  {
     $('#labshowmore').val(SUGAR.language.get('app_strings', 'LBL_SHOW_LESS'));
     $('.divshowmore').css('display','block'); 
  }
  else
  {
     $('#labshowmore').val(SUGAR.language.get('app_strings', 'LBL_SHOW_MORE'));
     $('.divshowmore').css('display','none');
  }
  
}

function readAllbookmark()
{
   $('.arrowdown>ul').find('a[record]').parent().remove();
   $('.arrowdown>ul').each(function(index) { 
      var bmodule=$(this).attr('id').replace("divmenu","");  
      readbookmark(bmodule,$(this).attr('id'));
   });     
} 

function readbookmark(bmodule,divmenu)
{
   var allbook=getCookie("fav_"+bmodule);
   
   if(allbook!="")
   {
    var cookiearray  = allbook.split('^');
    if(cookiearray.length==0)
      return;
    for(var i=cookiearray.length-1; i>=0; i--)
    {
      name = cookiearray[i].split('|')[0];
      value = cookiearray[i].split('|')[1];
      value=value.replace(/\\/, "\\");
      if($('#'+divmenu).find('a[record="'+value+'"]').length<=0)
      {
         $("#"+divmenu).append('<li><a record="'+value+'"href="index.php?module='+bmodule+'&amp;action=DetailView&amp;record='+value+'"><img border="0" alt="" src="themes/MetroThemePro/images/bookmark.png">&nbsp;&nbsp;'+name+'</a></li>');
      }
    }
   }
 }  
function isbookmark(bmodule,bid)
{
  var allbook=getCookie("fav_"+bmodule);
  if(allbook.indexOf(bid)>=0)
   return true;
  else
   return false; 
}

function removebookmark(bmodule,bid)
{
     var strcook="";
     var allbook=getCookie("fav_"+bmodule);
     var cookiearray  = allbook.split('^');
     var startfrom=0;
     
     if(cookiearray.length>12)
        startfrom=cookiearray.length-12;
     for(var i=startfrom; i<cookiearray.length; i++)
     {
      tmparr=cookiearray[i].split('|');
      name = tmparr[0];
      value = tmparr[1];
      if(bid!=value)
      {
        if(strcook=='')
         strcook=name+"|"+value;
        else
         strcook=strcook+"^"+name+"|"+value;
      }
     }
     setCookie("fav_"+bmodule, strcook,100);       
     readAllbookmark();
}  
function addbookmark(bmodule,bid)
{ 
     var strcook="";
     var allbook=getCookie("fav_"+bmodule);
     var cookiearray  = allbook.split('^');
     var startfrom=0;
     var bname;
     var url='index.php?to_pdf=1&module=MetroThemePro_mod&action=getrecordname&infomodule='+bmodule+'&inforecord='+bid;   
     $.ajax({
  				type: "GET",       				
          url: url,
   				async:true,
   				dataType: "html",                                             
  				success: function(data) {
             bname=data; 
             if(cookiearray.length>12)
                startfrom=cookiearray.length-12;       
             if(allbook!="")
             {
                 for(var i=startfrom; i<cookiearray.length; i++)
                 {
                  tmparr=cookiearray[i].split('|');
                  name = tmparr[0];
                  value = tmparr[1];
                  if(strcook=='')
                   strcook=name+"|"+value;
                  else
                   strcook=strcook+"^"+name+"|"+value;
                 }
             }    
             if(strcook=='')
               strcook=bname+"|"+bid;
              else
               strcook=strcook+"^"+bname+"|"+bid;
           
             setCookie("fav_"+bmodule, strcook,100);              
             readAllbookmark();
     }               
    });          

}  
  
//*********************************
// FUNZIONI GENERICHE
//*********************************
function setCookie(name, value, expires, path, domain, secure){
	document.cookie = name + "=" + escape(value) + "; ";	
	if(expires){
		expires = setExpiration(expires);
		document.cookie += "expires=" + expires + "; ";
	}
	if(path){
		document.cookie += "path=" + path + "; ";
	}
	if(domain){
		document.cookie += "domain=" + domain + "; ";
	}
	if(secure){
		document.cookie += "secure; ";
	}
}

function setExpiration(cookieLife){
    var today = new Date();
    var expr = new Date(today.getTime() + cookieLife * 24 * 60 * 60 * 1000);
    return  expr.toGMTString();
}
function getCookie(w){
	cName = "";
	pCOOKIES = new Array();
	pCOOKIES = document.cookie.split('; ');
	for(bb = 0; bb < pCOOKIES.length; bb++){
		NmeVal  = new Array();
		NmeVal  = pCOOKIES[bb].split('=');
		if(NmeVal[0] == w){
			cName = unescape(NmeVal[1]);
		}
	}
	return cName;
}
function is_int(value){ 
  if((parseFloat(value) == parseInt(value)) && !isNaN(value)){
       return true;
   } else { 
      return false;
   } 
}


function urlencoderow(ar) {
 return ar;
    for(J=0;J<ar.length;J++)
     ar[J]=urlencode(ar[J]);
    return ar;
}

function urlencode(str) {
  // http://kevin.vanzonneveld.net
  str = (str + '').toString();
  // Tilde should be allowed unescaped in future versions of PHP (as reflected below), but if you want to reflect current
  // PHP behavior, you would need to add ".replace(/~/g, '%7E');" to the following.
  return encodeURIComponent(str).replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').
  replace(/\)/g, '%29').replace(/\*/g, '%2A').replace(/%20/g, '+');
}

      