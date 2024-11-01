<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'admin_menu', 'wpbetterpages_add_admin_menu' );



function wpbetterpages_add_admin_menu(  ) { 

    $wpbetter_settings_page1 = add_menu_page( 'WP Better Pages', 'WP Better Pages', 'manage_options', 'WP-Better-Pages', 'wpbetterpages_showpagetempl' );
	
}

function wpbetterpages_showpagetempl() {
    
    
    
    ?>
    
    
    <style>
body {font-family: Arial;}

.tab {
overflow: hidden;
background-color: #FF5722;
box-shadow:0 3px 8px 1px rgba(0,0,0,.25);
}


.tab button {
background-color: inherit;
color: #fff;
float: left;
border: none;
outline: none;
cursor: pointer;
padding: 14px 16px;
transition: 0.3s;
font-size: 17px;
}


.tab button:hover {
background-color: #ddd;
color: #000000;
}


.tab button.active {
background-color: #fff;
color: #000000;
}

.tabcontent {
background-color: #fff;
color: #0052c7;
font-size: 20px;
display: none;
padding: 6px 12px;
border-top: none;
box-shadow:0 3px 8px 1px rgba(0,0,0,.25);
}

.grbutton {
  background-color: white;
  border: 2px solid #4CAF50;
  color: #4CAF50;
  padding: 4px 6px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  cursor: pointer;
}

.grbutton:hover {
  background-color: #4CAF50;
  color: white;
}

.black_overlay {
  display: none;
  position: absolute;
  top: 0%;
  left: 0%;
  width: 100%;
  height: 100%;
  background-color: black;
  z-index: 1001;
  -moz-opacity: 0.8;
  opacity: .80;
  filter: alpha(opacity=80);
}
.white_content {
  display: none;
  position: absolute;
  top: 13%;
  left: 13%;
  width: 65%;
  height: 60%;
  padding: 16px;
  border: 10px solid #8BC34A;
  background-color: white;
  z-index: 1002;
  overflow: auto;
}

</style>

<?php 

    $imgurl = plugins_url( 'Logo.png', __FILE__ );
    echo '<p style="text-align:center;"><img src="' . $imgurl . '"/></p>';
?>


<div style="display: grid;grid-template-columns: 4fr 1fr;grid-template-rows: 1fr;">
    
  <div style="grid-area: 1 / 1 / 2 / 2;">

        <div class="tab">
            <button id="tablinks1" class="tablinks" onclick="openTab(event, 'shortcodes')">Shortcodes</button>
            <button class="tablinks" onclick="openTab(event, 'grid')">Convert Grid</button>
            <button class="tablinks" onclick="openTab(event, 'rowbuilder')">Build Rows / Columns</button>
            <button class="tablinks" onclick="openTab(event, 'templates')">Templates</button>
        </div>

        <div id="shortcodes" class="tabcontent">
    
        <div>
      
              <br/>Grid Shortcode:<br><br>
        <textarea rows="8" cols="90">[wpbtr_grid class="yourclass" columns="1fr 1fr 1fr 1fr" rows="auto auto auto" style=""]
[wpbtr_cell class="yourclass-1" area="1 / 1 / 3 / 3" style=""][/wpbtr_cell]
[wpbtr_cell class="yourclass-2" area="1 / 3 / 3 / 5" style=""][/wpbtr_cell]
[wpbtr_cell class="yourclass-3" area="3 / 1 / 4 / 5" style=""][/wpbtr_cell]
[/wpbtr_grid]</textarea>
        
            </div>
            
            <div>
              
              <br/>Row Shortcode:<br><br>
        <textarea rows="8" cols="90">[wpbtr_rows class="yourclass" rows="auto auto auto auto" style="border: 1px solid #4CAF50;color: #000000; background-color: #fff;"]
[wpbtr_rowchild class="yourclass-1" style=""][/wpbtr_rowchild]
[wpbtr_rowchild class="yourclass-2" style=""][/wpbtr_rowchild]
[wpbtr_rowchild class="yourclass-3" style=""][/wpbtr_rowchild]
[wpbtr_rowchild class="yourclass-4" style=""][/wpbtr_rowchild]
[/wpbtr_rows]</textarea>
        
            </div>
            
            <div>
              
              <br/>Column Shortcode:<br><br>
        <textarea rows="8" cols="90">[wpbtr_cols class="yourclass" cols="25% 25% 25% 25%" style="border: 1px solid #4CAF50;color: #000000; background-color: #fff;"]
[wpbtr_colchild class="yourclass-1" style=""][/wpbtr_colchild]
[wpbtr_colchild class="yourclass-2" style=""][/wpbtr_colchild]
[wpbtr_colchild class="yourclass-3" style=""][/wpbtr_colchild]
[wpbtr_colchild class="yourclass-4" style=""][/wpbtr_colchild]
[/wpbtr_cols]</textarea>
        
            </div>
            
</div>

        <div id="grid" class="tabcontent">
            
        <div>
          <br/>Convert CSS To Shortcode You can get CSS code from here : <a target="_blank" href="https://grid.layoutit.com/">CSS Code</a>
        </div>
        <div>
          
          <br/><br/>CSS Code:<br><br>
        <textarea id="myTextarea" rows="8" cols="70"></textarea>
    
        </div>
        
        <div>
          <button type="button" class="grbutton" onclick="buildgrid()">Convert</button>
            
    
        </div>
        
        <div>
          
        <br/>Shortcode:<br><br>
            <textarea id="myTextarea2" rows="8" cols="70"></textarea>
    
        </div>
            
</div>

        <div id="rowbuilder" class="tabcontent">
    
    <div>
        <br/>
        <div style="display: grid;grid-template-columns: 1.7fr 1fr 1.3fr;grid-template-rows: auto;max-width:520px;">
            <div style="grid-area: 1 / 1 / 2 / 2;">Number Of Rows : </div>
            <div style="grid-area: 1 / 2 / 2 / 3;"><input type="text" id="numrows" size="8"></div>
            <div style="grid-area: 1 / 3 / 2 / 4;"><button type="button" class="grbutton" onclick="buildrows()">Build Rows</button></div>
        </div>
        <br/>
        <div style="display: grid;grid-template-columns: 1.7fr 1fr 1.3fr;grid-template-rows: auto;max-width:520px;">
            <div style="grid-area: 1 / 1 / 2 / 2;">Number Of Columns : </div>
            <div style="grid-area: 1 / 2 / 2 / 3;"><input type="text" id="numcols" size="8"></div>
            <div style="grid-area: 1 / 3 / 2 / 4;"><button type="button" class="grbutton" onclick="buildcols()">Build Columns</button></div>
        </div>
        
    </div>
    <br/>
    <div>
      
      <textarea id="rowcode" rows="8" cols="70"></textarea>

    </div>
    
</div>

        <div id="templates" class="tabcontent">
            
            <br/>
            <div style="display: grid;grid-template-columns: .4fr 1.6fr;grid-template-rows: auto;">
                <br/>
                <div style="grid-area: 1 / 1 / 2 / 2;display: flex;justify-content: center;align-items: center;flex-direction:column;">
                    
                    <button type="button" class="grbutton" style="height:40px;width:200px" onclick="addItem('templates/optin/')">Optin Sections</button><br/>
                    <button type="button" class="grbutton" style="height:40px;width:200px" onclick="addItem('templates/cta/')">Call To Action</button><br/>
                    <button type="button" class="grbutton" style="height:40px;width:200px" onclick="addItem('templates/review/')">Review Sections</button><br/>
                    <button type="button" class="grbutton" style="height:40px;width:200px" onclick="addItem('templates/deals/')">Deals And Coupons</button><br/>
                    <button type="button" class="grbutton" style="height:40px;width:200px" onclick="addItem('templates/widgets/')">Widgets</button><br/>
                    <button type="button" class="grbutton" style="height:40px;width:200px" onclick="addItem('templates/social/')">Social Media</button><br/>
                    <button type="button" class="grbutton" style="height:40px;width:200px" onclick="addItem('templates/toc/')">Table Of Content</button><br/>
                    <button type="button" class="grbutton" style="height:40px;width:200px" onclick="addItem('templates/authorbio/')">Author Bio</button><br/>
                    <button type="button" class="grbutton" style="height:40px;width:200px" onclick="addItem('templates/pages/')">Landing Pages</button>
                    
                </div>
                
                <div style="grid-area: 1 / 2 / 2 / 3;padding:20px;">
                    
                    <div id="light" class="white_content">
                        <div style="display: grid;grid-template-columns: 1fr;grid-template-rows: auto auto;">
                        
                            <div style="grid-area: 1 / 1 / 2 / 2;text-align: right">
                                <button type="button" class="grbutton" style="height:35px;width:200px;margin-right:10px;" onclick="changeclass()">Change Class</button>
                                <button type="button" class="grbutton" style="height:35px;width:100px;" onclick="hidecode()">Close</button>
                            </div>
                            <div style="grid-area: 2 / 1 / 3 / 2;padding:10px;">
                                
                                <br/>Shortcode:<br><br>
                                <textarea style="font-size:18px;" id="codeshown" rows="14" cols="95"></textarea>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div id="fade" class="black_overlay"></div>

                    <div id="templaterow" style="display: inline-block;text-align: center;">
                            
                    </div>
                        
                    <!-- <div class="tab">
                        <button class="tablinks" onclick="openTab(event, 'Select',true)">Select</button>
                        <button class="tablinks" onclick="openTab(event, 'Preview23', true)">Preview</button>
                    </div>
    
                    <div id="Select" class="tabcontent" style="padding:20px;">
                        
                        
                    </div>
                
                    <div id="Preview23" class="tabcontent" style="padding:20px;">
                        <textarea id="codeshown" rows="8" cols="90"> </textarea>
                    </div> -->

                </div>
                
            </div>
    
        </div>
      
  </div>
  
  <div style="grid-area: 1 / 2 / 2 / 3;background-color:#fff;border: 1px solid #ccc;">
      
      <p style="text-align:center;font-size: 23px;color: #FF5722;">Examples</p>
      
      <p style="margin-left:20px;font-size: 20px;"><a href="https://wpbetterpages.com/optin-section/" target="_blank">Optin Sections</a></p>
      
      <p style="margin-left:20px;font-size: 20px;"><a href="https://wpbetterpages.com/cta-section/" target="_blank">Call To Action</a></p>
      
      <p style="margin-left:20px;font-size: 20px;"><a href="https://wpbetterpages.com/review-section/" target="_blank">Review Sections</a></p>
      
      <p style="margin-left:20px;font-size: 20px;"><a href="https://wpbetterpages.com/deals-and-coupons/" target="_blank">Deals And Coupons</a></p>
      
      <p style="margin-left:20px;font-size: 20px;"><a href="https://wpbetterpages.com/popups/" target="_blank">Popups</a></p>
      
      <p style="margin-left:20px;font-size: 20px;"><a href="https://wpbetterpages.com/widgets/" target="_blank">Widgets</a></p>
      
      <p style="margin-left:20px;font-size: 20px;"><a href="https://wpbetterpages.com/social-media/" target="_blank">Social Media</a></p>
      
      <p style="margin-left:20px;font-size: 20px;"><a href="https://wpbetterpages.com/table-of-content/" target="_blank">Table Of Content</a></p>
      
      <p style="margin-left:20px;font-size: 20px;"><a href="https://wpbetterpages.com/author-bio/" target="_blank">Author Bio</a></p>
      
      <p style="margin-left:20px;font-size: 20px;"><a href="https://wpbetterpages.com/landing-pages/" target="_blank">Landing Pages</a></p>
      
  </div>
</div>



<!--
<div id="gridtemplate" class="tabcontent">
    <h4 style="text-align:center;">Choose the number of cells (Remember to change all the class names)</h4>
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, '2cells',true)">2 Cells</button>
        <button class="tablinks" onclick="openTab(event, '3cells', true)">3 Cells</button>
        <button class="tablinks" onclick="openTab(event, '4cells', true)">4 Cells</button>
        <button class="tablinks" onclick="openTab(event, '5cells', true)">5 Cells</button>
        <button class="tablinks" onclick="openTab(event, '6cells', true)">6 Cells</button>
    </div>
    
    <div id="2cells" class="tabcontent">
        <table style="width:100%;border-spacing: 10px;">
          <tr>
            <td>
                <div style="display: grid;grid-template-columns: 1fr 1fr;grid-template-rows: 1fr;border: 1px solid #000000;background-color: #fff;">
                    <div style="grid-area: 1 / 1 / 2 / 2;">Area 1</div>
                    <div style="grid-area: 1 / 2 / 2 / 3;border-left: 1px solid #000000;background-color: #fff;">Area 2</div>
                </div>
            </td>
            <td>
                <textarea id="myTextarea" rows="6" cols="70">
[wpbtr_grid class="kcuyGo9f" columns="1fr 1fr" rows="1fr" style="border: 1px solid #000000;background-color: #fff;"]
[wpbtr_cell class="kcuyGo9f-1" area="1 / 1 / 2 / 2" style=""]Area 1[/wpbtr_cell]
[wpbtr_cell class="kcuyGo9f-2" area="1 / 2 / 2 / 3" style="border-left: 1px solid #000000;background-color: #fff;"]Area 2[/wpbtr_cell]
[/wpbtr_grid]</textarea>
            </td> 
          </tr>
          <tr>
            <td>
                <div style="display: grid;grid-template-columns: 2fr 1fr;grid-template-rows: 1fr;border: 1px solid #000000;background-color: #fff;">
                    <div style="grid-area: 1 / 1 / 2 / 2;">Area 1</div>
                    <div style="grid-area: 1 / 2 / 2 / 3;border-left: 1px solid #000000;background-color: #fff;">Area 2</div>
                </div>
            </td>
            <td>
                <textarea id="myTextarea" rows="6" cols="70">
[wpbtr_grid class="kcuyGo9f" columns="2fr 1fr" rows="1fr" style="border: 1px solid #000000;background-color: #fff;"]
[wpbtr_cell class="kcuyGo9f-1" area="1 / 1 / 2 / 2" style=""]Area 1[/wpbtr_cell]
[wpbtr_cell class="kcuyGo9f-2" area="1 / 2 / 2 / 3" style="border-left: 1px solid #000000;background-color: #fff;"]Area 2[/wpbtr_cell]
[/wpbtr_grid]</textarea>
            </td> 
          </tr>
          <tr>
            <td>
                <div style="display: grid;grid-template-columns: 1fr 2fr;grid-template-rows: 1fr;border: 1px solid #000000;background-color: #fff;">
                    <div style="grid-area: 1 / 1 / 2 / 2;">Area 1</div>
                    <div style="grid-area: 1 / 2 / 2 / 3;border-left: 1px solid #000000;background-color: #fff;">Area 2</div>
                </div>
            </td>
            <td>
                <textarea id="myTextarea" rows="6" cols="70">
[wpbtr_grid class="kcuyGo9f" columns="1fr 2fr" rows="1fr" style="border: 1px solid #000000;background-color: #fff;"]
[wpbtr_cell class="kcuyGo9f-1" area="1 / 1 / 2 / 2" style=""]Area 1[/wpbtr_cell]
[wpbtr_cell class="kcuyGo9f-2" area="1 / 2 / 2 / 3" style="border-top: 1px solid #000000;background-color: #fff;"]Area 2[/wpbtr_cell]
[/wpbtr_grid]</textarea>
            </td> 
          </tr>
          
          <tr>
            <td>
                <div style="display: grid;grid-template-columns: 1fr;grid-template-rows: 1fr 1fr;border: 1px solid #000000;background-color: #fff;">
                    <div style="grid-area: 1 / 1 / 2 / 2;">Area 1</div>
                    <div style="grid-area: 2 / 1 / 3 / 2;border-top: 1px solid #000000;background-color: #fff;">Area 2</div>
                </div>
            </td>
            <td>
                <textarea id="myTextarea" rows="6" cols="70">
[wpbtr_grid class="kcuyGo9f" columns="1fr" rows="1fr 1fr" style="border: 1px solid #000000;background-color: #fff;"]
[wpbtr_cell class="kcuyGo9f-1" area="1 / 1 / 2 / 2" style=""]Area 1[/wpbtr_cell]
[wpbtr_cell class="kcuyGo9f-2" area="2 / 1 / 3 / 2" style="border-top: 1px solid #000000;background-color: #fff;"]Area 2[/wpbtr_cell]
[/wpbtr_grid]</textarea>
            </td> 
          </tr>
          <tr>
            <td>
                <div style="display: grid;grid-template-columns: 1fr;grid-template-rows: 2fr 1fr;border: 1px solid #000000;background-color: #fff;">
                    <div style="grid-area: 1 / 1 / 2 / 2;">Area 1</div>
                    <div style="grid-area: 2 / 1 / 3 / 2;border-top: 1px solid #000000;background-color: #fff;">Area 2</div>
                </div>
            </td>
            <td>
                <textarea id="myTextarea" rows="6" cols="70">
[wpbtr_grid class="kcuyGo9f" columns="1fr" rows="2fr 1fr" style="border: 1px solid #000000;background-color: #fff;"]
[wpbtr_cell class="kcuyGo9f-1" area="1 / 1 / 2 / 2" style=""]Area 1[/wpbtr_cell]
[wpbtr_cell class="kcuyGo9f-2" area="2 / 1 / 3 / 2" style="border-top: 1px solid #000000;background-color: #fff;"]Area 2[/wpbtr_cell]
[/wpbtr_grid]</textarea>
            </td> 
          </tr>
          <tr>
            <td>
                <div style="display: grid;grid-template-columns: 1fr;grid-template-rows: 1fr 2fr;border: 1px solid #000000;background-color: #fff;">
                    <div style="grid-area: 1 / 1 / 2 / 2;">Area 1</div>
                    <div style="grid-area: 2 / 1 / 3 / 2;border-top: 1px solid #000000;background-color: #fff;">Area 2</div>
                </div>
            </td>
            <td>
                <textarea id="myTextarea" rows="6" cols="70">
[wpbtr_grid class="kcuyGo9f" columns="1fr" rows="1fr 2fr" style="border: 1px solid #000000;background-color: #fff;"]
[wpbtr_cell class="kcuyGo9f-1" area="1 / 1 / 2 / 2" style=""]Area 1[/wpbtr_cell]
[wpbtr_cell class="kcuyGo9f-2" area="2 / 1 / 3 / 2" style="border-top: 1px solid #000000;background-color: #fff;"]Area 2[/wpbtr_cell]
[/wpbtr_grid]</textarea>
            </td> 
          </tr>
        </table>
    </div>

    <div id="3cells" class="tabcontent">
        My stuff doel2
    </div>

    <div id="4cells" class="tabcontent">
        My stuff doel3
    </div>
    
    <div id="5cells" class="tabcontent">
        My stuff doel2
    </div>

    <div id="6cells" class="tabcontent">
        My stuff doel3
    </div>
</div>
-->


<script>

document.getElementById("tablinks1").click(); 

function buildgrid() {
    
    var resultp = '';
    var charactersp = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = charactersp.length;
    for ( var i = 0; i < 8; i++ ) {
        resultp += charactersp.charAt(Math.floor(Math.random() * charactersLength));
        }
   
   
  var im = 0;
  var x = '';
  
  var myString = document.getElementById("myTextarea").value;
  
  var myRegexp = /grid-template-columns: (.*);/g;
match = myRegexp.exec(myString);
while (match != null) {
  x= x + '[wpbtr_grid class="' + resultp + '" columns="' + match[1] + '" ';
  match = myRegexp.exec(myString);
}

myRegexp = /grid-template-rows: (.*);/g;
match = myRegexp.exec(myString);
while (match != null) {
  x= x + 'rows="' + match[1].replace(/1fr/g, "auto") + '" style=""]' + "\n";
  match = myRegexp.exec(myString);
}

myRegexp = /grid-area: (.*);/g;
match = myRegexp.exec(myString);
while (match != null) {
    im = im + 1;
  x= x + '[wpbtr_cell class="' + resultp + '-' + im + '" area="' + match[1] + '" style=""][/wpbtr_cell]' + "\n";
  match = myRegexp.exec(myString);
}

x= x + '[/wpbtr_grid]';
document.getElementById("myTextarea2").value = x;
}

function buildrows() {
    
    var resultp = '';
    var charactersp = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = charactersp.length;
    for ( var i = 0; i < 8; i++ ) {
        resultp += charactersp.charAt(Math.floor(Math.random() * charactersLength));
        }
   
   var rowstr = '[wpbtr_rows class="' + resultp + '" rows="{numrowshere}" style="border: 1px solid #000000;background-color: #fff;"]{childrows}[/wpbtr_rows]';
   
   var rowstr1='\n';
   var rowcnt = document.getElementById("numrows").value;
    for ( var i = 1; i <= rowcnt; i++ ) {
        rowstr1 += '[wpbtr_rowchild class="' + resultp + '-' + i + '" style=""][/wpbtr_rowchild]' + '\n';
        }
   
   var rowstr2='';
    for ( var i = 0; i < rowcnt-1; i++ ) {
        rowstr2 += "auto ";
        }
   rowstr2 += "auto";
   
   rowstr = rowstr.replace("{numrowshere}", rowstr2);
   rowstr = rowstr.replace("{childrows}", rowstr1);
   
  document.getElementById("rowcode").value = rowstr;
}

function buildcols() {
    
    var resultp = '';
    var charactersp = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = charactersp.length;
    for ( var i = 0; i < 8; i++ ) {
        resultp += charactersp.charAt(Math.floor(Math.random() * charactersLength));
        }
   
   var rowstr = '[wpbtr_cols class="' + resultp + '" cols="{numcolshere}" style="border: 1px solid #000000;background-color: #fff;"]{childcols}[/wpbtr_cols]';
   
   var rowstr1='\n';
   var rowcnt = document.getElementById("numcols").value;
    for ( var i = 1; i <= rowcnt; i++ ) {
        rowstr1 += '[wpbtr_colchild class="' + resultp + '-' + i + '" style=""][/wpbtr_colchild]' + '\n';
        }
   
   var rowstr2='';
    for ( var i = 0; i < rowcnt-1; i++ ) {
        rowstr2 += "1fr ";
        }
   rowstr2 += "1fr";
   
   rowstr = rowstr.replace("{numcolshere}", rowstr2);
   rowstr = rowstr.replace("{childcols}", rowstr1);
   
  document.getElementById("rowcode").value = rowstr;
}

function openTab(evt, openTab, subTab) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");

    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    if(subTab) {
      var parent = evt.currentTarget.closest('.tabcontent');
      parent.style.display = "block";
      parent.className += " active";
    }
    document.getElementById(openTab).style.display = "block";
    evt.currentTarget.className += " active";

}

function addItem(folder){
    var string = folder,
    regex = /optin/;

    if(regex.test(string) == true)
    {
        removeItem();
        var ul = document.getElementById("templaterow");
        for (i = 1; i <= 8; i++) {
            var li = document.createElement("button");
            li.setAttribute("class","grbutton");
            li.setAttribute("onclick","showcode('" + folder + i + ".txt" + "')");
            li.setAttribute("style","height:40px; width:170px;margin:10px;");
            li.appendChild(document.createTextNode("Template " + i));
            ul.appendChild(li);
        }
    }
    
    regex = /cta/;

    if(regex.test(string) == true)
    {
        removeItem();
        var ul = document.getElementById("templaterow");
        for (i = 1; i <= 6; i++) {
            var li = document.createElement("button");
            li.setAttribute("class","grbutton");
            li.setAttribute("onclick","showcode('" + folder + i + ".txt" + "')");
            li.setAttribute("style","height:40px; width:170px;margin:10px;");
            li.appendChild(document.createTextNode("Template " + i));
            ul.appendChild(li);
        }
    }
    
    regex = /review/;

    if(regex.test(string) == true)
    {
        removeItem();
        var ul = document.getElementById("templaterow");
        for (i = 1; i <= 5; i++) {
            var li = document.createElement("button");
            li.setAttribute("class","grbutton");
            li.setAttribute("onclick","showcode('" + folder + i + ".txt" + "')");
            li.setAttribute("style","height:40px; width:170px;margin:10px;");
            li.appendChild(document.createTextNode("Template " + i));
            ul.appendChild(li);
        }
    }
    
    regex = /deals/;

    if(regex.test(string) == true)
    {
        removeItem();
        var ul = document.getElementById("templaterow");
        for (i = 1; i <= 5; i++) {
            var li = document.createElement("button");
            li.setAttribute("class","grbutton");
            li.setAttribute("onclick","showcode('" + folder + i + ".txt" + "')");
            li.setAttribute("style","height:40px; width:170px;margin:10px;");
            li.appendChild(document.createTextNode("Template " + i));
            ul.appendChild(li);
        }
    }
    
    regex = /widgets/;

    if(regex.test(string) == true)
    {
        removeItem();
        var ul = document.getElementById("templaterow");
        for (i = 1; i <= 6; i++) {
            var li = document.createElement("button");
            li.setAttribute("class","grbutton");
            li.setAttribute("onclick","showcode('" + folder + i + ".txt" + "')");
            li.setAttribute("style","height:40px; width:170px;margin:10px;");
            li.appendChild(document.createTextNode("Template " + i));
            ul.appendChild(li);
        }
    }
    
    regex = /social/;

    if(regex.test(string) == true)
    {
        removeItem();
        var ul = document.getElementById("templaterow");
        for (i = 1; i <= 6; i++) {
            var li = document.createElement("button");
            li.setAttribute("class","grbutton");
            li.setAttribute("onclick","showcode('" + folder + i + ".txt" + "')");
            li.setAttribute("style","height:40px; width:170px;margin:10px;");
            li.appendChild(document.createTextNode("Template " + i));
            ul.appendChild(li);
        }
    }
    
    regex = /toc/;

    if(regex.test(string) == true)
    {
        removeItem();
        var ul = document.getElementById("templaterow");
        for (i = 1; i <= 5; i++) {
            var li = document.createElement("button");
            li.setAttribute("class","grbutton");
            li.setAttribute("onclick","showcode('" + folder + i + ".txt" + "')");
            li.setAttribute("style","height:40px; width:170px;margin:10px;");
            li.appendChild(document.createTextNode("Template " + i));
            ul.appendChild(li);
        }
    }
    
    regex = /authorbio/;

    if(regex.test(string) == true)
    {
        removeItem();
        var ul = document.getElementById("templaterow");
        for (i = 1; i <= 4; i++) {
            var li = document.createElement("button");
            li.setAttribute("class","grbutton");
            li.setAttribute("onclick","showcode('" + folder + i + ".txt" + "')");
            li.setAttribute("style","height:40px; width:170px;margin:10px;");
            li.appendChild(document.createTextNode("Template " + i));
            ul.appendChild(li);
        }
    }
    
    regex = /pages/;

    if(regex.test(string) == true)
    {
        removeItem();
        var ul = document.getElementById("templaterow");
        for (i = 1; i <= 5; i++) {
            var li = document.createElement("button");
            li.setAttribute("class","grbutton");
            li.setAttribute("onclick","showcode('" + folder + i + ".txt" + "')");
            li.setAttribute("style","height:40px; width:170px;margin:10px;");
            li.appendChild(document.createTextNode("Template " + i));
            ul.appendChild(li);
        }
    }
    
}

function removeItem(){
    var ul = document.getElementById("templaterow");
    while (ul.firstChild) {
    ul.removeChild(ul.firstChild);
    }
}

function showcode(folder2) {
    
    document.getElementById("codeshown").value='';
    var fret = ' <?php echo (plugin_dir_url(__FILE__)); ?> ';
    
    //document.getElementById("codeshown").value = fret;
    var xhttp;
    if (folder2.length == 0) { 
        document.getElementById("codeshown").value = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
          document.getElementById("codeshown").value = this.responseText;
        }
    };
    xhttp.open("GET", fret.trim()+folder2.trim(), true);
    xhttp.send();  
    
	document.getElementById('light').style.display='block';
	document.getElementById('fade').style.display='block';
	
    
}

function hidecode() {
    
    document.getElementById('light').style.display='none';
	document.getElementById('fade').style.display='none';
    
}

function changeclass()
{
    var resultp = '';
    var charactersp = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = charactersp.length;
    for ( var i = 0; i < 8; i++ ) {
        resultp += charactersp.charAt(Math.floor(Math.random() * charactersLength));
        }
    var txt = document.getElementById("codeshown").value;
    document.getElementById("codeshown").value = txt.replace(/wpbtrclass/g, resultp);
}
</script>
   
    
    <?php

}

   

?>