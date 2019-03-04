// open ajax connection with the server
function openAjaxConnection(url){
    ajax = new XMLHttpRequest();
    ajax.open("GET", url, true);
    ajax.onreadystatechange = handleResponse;
    ajax.send();
}

// handle the ajax response and build a table
function handleResponse(){
    if(ajax.readyState === 4) {// Data returned from the server. 
        if(ajax.status === 200) {// There is no error. 
            
            var response = JSON.parse(ajax.responseText);
            
            if(Array.isArray(response)) {
                createTable(response);
            }
            else {
                alert(response.message);
            }
        }
        else { // There is some error...
            alert("Error! Status: " + ajax.status + ", Message: " + ajax.statusText);
        }        
    }
}

// create table for the ajax response
function createTable(movies) {
    //get the elements from the html page and separate the Thead and TBody So that the search element applies only to the table body
    var theadTableMovies = document.getElementById("theadTableMovies");
    var tableMovies = document.getElementById("tableMovies");
    
    //create the header for the table in html
    var headerTR = "<tr><th class='text-center'>Title</th><th class='text-center'>Category</th>\n\
                    <th class='text-center'>Description</th><th class='text-center'>Play  <span class='glyphicon glyphicon-expand'></span></th>\n\
                    <th class='text-center'>Edit  <span class='glyphicon glyphicon-pencil'</th><th class='text-center'>Delete  <span class='glyphicon glyphicon-trash'</th></tr>";
    
    var tableContent;
    
    // get and insert the content from DB into the table 
    for(var i = 0; i < movies.length; i++) {
        var titleTD = "<td id='tdTitle'>" + movies[i].title + "</td>";
        var categoryTD = "<td id='tdCategory'>" + movies[i].category + "</td>";
        var descriptionTD = "<td id='tdDescription'>" + movies[i].description + "</td>";
        
        var linkString = JSON.stringify(movies[i].videoLink);
        var linkTD = "<td id='tdLink'><a href='#'><span data-toggle='modal' data-target='#modalYT' onclick='showYTVideo("+linkString+")' class='glyphicon glyphicon-expand' onclick='playVideo("+linkString+")'></span></a></td>";
        
        var username = JSON.stringify(movies[i].username);
        var id = movies[i].id;
        var titleString =  JSON.stringify(movies[i].title);
        var categoryString = JSON.stringify(movies[i].category);
        var descriptionString = JSON.stringify(movies[i].description);

        var editTD = "<td><a href='#'><span class='glyphicon glyphicon-pencil'  onclick='createModal("+ id + "," + titleString + ","+ categoryString + "," + descriptionString + "," + username + ")' id='myBtn'></span></a></td>";
        var deleteTD = "<td><a href='#'><span class='glyphicon glyphicon-trash' onclick='deleteRow("+id+")'></span></a></td>";
        var movieTR = "<tr class='movieTR'>" + titleTD + categoryTD + descriptionTD + linkTD + editTD + deleteTD + "</tr>";
        tableContent += movieTR;
    }
    
    // insert the data into the table
    theadTableMovies.innerHTML = headerTR;
    
    tableMovies.innerHTML = tableContent;
    tableMovies.childNodes[0].nodeValue = null;
}

// get the playlist from the server using ajax
function getPlaylist(){
    var url = "http://localhost/playlist/PHP/API.php?command=getMovies";
    openAjaxConnection(url);
}

// create modal for edit row
function createModal(id,title,category,description){
    // Get the modal
var modal = document.getElementById('editModal');
modal.style.display = "block";

//insert data into modal inputs
var idEdit = document.getElementById("idEdit").value = id;
var titleEdit = document.getElementById("titleEdit").value = title;
var categoryEdit = document.getElementById("categoryEdit").value =category;
var descriptionEdit = document.getElementById("descriptionEdit").value =description;

// clean the success message from the modal - if there is one
var successMessage = document.getElementById("successMessage");
successMessage.innerHTML = "";

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
};
}

// update rows in the table
function updateRow(){
    // get the data content from html
    var idEdit = document.getElementById("idEdit").value;
    var titleEditBox = document.getElementById("titleEdit");
    var categoryEditBox = document.getElementById("categoryEdit");
    var descriptionEditBox = document.getElementById("descriptionEdit");
    var successMessage = document.getElementById("successMessage");
    
    var titleEdit = titleEditBox.value;
    var categoryEdit = categoryEditBox.value;
    var descriptionEdit = descriptionEditBox.value;
    
//     validate the data content
    if(!updateRowValidation(titleEditBox, categoryEditBox, descriptionEditBox)){
        return;
    }
  
    var url = "http://localhost/playlist/PHP/API.php?command=updateMovies&id="+idEdit+"&title="+titleEdit+"&category="+categoryEdit+"&description="+descriptionEdit;
    
    ajax = new XMLHttpRequest();
    ajax.open("GET", url, true);
    ajax.onreadystatechange = function(){
    if(ajax.readyState === 4) { 
        if(ajax.status === 200) {
            // If there is an error, it will be displayed as a message with the element id
            JSON.parse(ajax.responseText);
            var messageFromServer = document.getElementById("messageFromServer");
            messageFromServer.innerHTML =ajax.responseText;   
            }
        }
    };
    ajax.send();

    var text = "your data was updated succesfully!!";
    successMessage.innerHTML = text;
}

//validation for updateRow function
function updateRowValidation(titleEditBox, categoryEditBox, descriptionEditBox){
    var titleEdit = titleEditBox.value;
    
    var titleErrorMessage = document.getElementById("titleErrorMessage");
    var categoryErrorMessage = document.getElementById("categoryErrorMessage");
    var descriptionErrorMessage = document.getElementById("descriptionErrorMessage");
    
    titleEditBox.style.borderColor = "";
    titleErrorMessage.innerHTML = "";
    categoryEditBox.style.borderColor = "";
    categoryErrorMessage.innerHTML = "";
    descriptionEditBox.style.borderColor = "";
    descriptionErrorMessage.innerHTML = "";
    
    if(titleEdit === ""){
        var text = "Title is missing..";
        titleEditBox.style.borderColor = "red";
        titleEditBox.focus();
        titleErrorMessage.innerHTML = text;
        return false;
    }
    var categoryEdit = categoryEditBox.value;

    if(categoryEdit === ""){
        text ="Category is missing..";
        categoryEditBox.style.borderColor = "red";
        categoryEditBox.focus();
        categoryErrorMessage.innerHTML = text;
        return false;
    }
    var descriptionEdit = descriptionEditBox.value;
    
    if(descriptionEdit === ""){
        text = "Description is missing..";
        descriptionEditBox.style.borderColor = "red";
        descriptionEditBox.focus();
        descriptionErrorMessage.innerHTML = text;
        return false;
    }
    return true;
}

//delete rows in the table
function deleteRow(id){
    var deleteID = id;
    if (confirm("are you sure?") === true){
        ajax = new XMLHttpRequest();
        var url = "http://localhost/playlist/PHP/API.php?command=deleteRow&id="+deleteID;
        openAjaxConnection(url);
        }
    window.location.href = "http://localhost/playlist/php/getPlaylist.php"; 
}

// add row to the table
function addRow(){
   
    var addTitleBox = document.getElementById("addTitle");
    var addCategoryBox = document.getElementById("addCategory");
    var addDescriptionBox = document.getElementById("addDescription");
    var addVideoLinkBox = document.getElementById("addVideoLink");
    var username = document.getElementById("usernameAddRow").value;
    var successMessage = document.getElementById("successMessage");
    
    var addTitle = addTitleBox.value;
    var addCategory = addCategoryBox.value;
    var addDescription = addDescriptionBox.value;
    var addVideoLink = addVideoLinkBox.value;
    
    successMessage.innerHTML = "";
    
    if(!addRowValidation(addTitleBox, addCategoryBox, addDescriptionBox, addVideoLinkBox)){
        return;
    }
    var url = "http://localhost/playlist/PHP/API.php?command=addMovie&title="+addTitle+"&category="+addCategory+"&description="+addDescription+"&videoLink="+addVideoLink+"&username="+username;
    
    openAjaxConnection(url);
    
    text = "your data was added succesfully!!";
    successMessage.innerHTML = text;
}

// validate for addRow function
function addRowValidation(addTitleBox, addCategoryBox, addDescriptionBox, addVideoLinkBox){
    
    var title = addTitleBox.value;
    var category = addCategoryBox.value;
    var description = addDescriptionBox.value;
    var videoLink = addVideoLinkBox.value;
    
    var addTitleError = document.getElementById("addTitleError");
    var addCategoryError = document.getElementById("addCategoryError");
    var addDescriptionError = document.getElementById("addDescriptionError");
    var addVideoLinkError = document.getElementById("addVideoLinkError");
    
    addTitleBox.style.borderColor = "";
    addTitleError.innerHTML = "";
    addCategoryBox.style.borderColor = "";
    addCategoryError.innerHTML = "";
    addDescriptionBox.style.borderColor = "";
    addDescriptionError.innerHTML = "";
    addVideoLinkBox.style.borderColor = "";
    addVideoLinkError.innerHTML = "";
    
    if(title === ""){
        var text = "Title is missing..";
        addTitleBox.style.borderColor = "red";
        addTitleBox.focus();
        addTitleError.innerHTML = text;
        return false;
    }
    if(category === ""){
        text = "Category is missing..";
        addCategoryBox.style.borderColor = "red";
        addCategoryBox.focus();
        addCategoryError.innerHTML = text;
        return false;
    }
    if(description === ""){
        text = "Description is missing..";
        addDescriptionBox.style.borderColor = "red";
        addDescriptionBox.focus();
        addDescriptionError.innerHTML = text;
        return false;
    }
    if(videoLink === ""){
        text = "Video Link is missing..";
        addVideoLinkBox.style.borderColor = "red";
        addVideoLinkBox.focus();
        addVideoLinkError.innerHTML = text;
        return false;
    }
    if(!is_url(videoLink)){
        text = "Please insert URL Link..";
        addVideoLinkBox.style.borderColor = "red";
        addVideoLinkBox.focus();
        addVideoLinkError.innerHTML = text;
        return false;
    }
    
    return true;
}

// url validate
function is_url(str)
{
  regexp =  /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
        if (regexp.test(str))
        {
          return true;
        }
        else
        {
          return false;
        }
}

// login and registar page form display 
 $(function() {
     
    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
});
    
//play the video on iframe by id
function showYTVideo(linkString){
    
    // get the URL link and split it by ?v sign
    var url = linkString;
    var id = url.split("?v=")[1];
    
    // create a new embed link 
    var embedlink = "http://www.youtube.com/embed/" + id;
    
    // insert the link into the iframe source
    var videoYT = document.getElementById('iframeYouTube');
    videoYT.src = embedlink;
}

//Search in the table
$(document).ready(function(){
  $("#searchInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tableMovies tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
});

//login validation
function validateLoginForm(){

var usernameLogin = document.getElementById("usernameLogin");
var passwordLogin = document.getElementById("passwordLogin");

var username = usernameLogin.value;
var password = passwordLogin.value;

var errorUsernameLogin = document.getElementById("errorUsernameLogin");
var errorPasswordLogin = document.getElementById("errorPasswordLogin");

usernameLogin.style.borderColor = "";
errorUsernameLogin.innerHTML = "";
passwordLogin.style.borderColor = "";
errorPasswordLogin.innerHTML = "";

var text;

    if (username === "") {
        usernameLogin.style.borderColor = "red";
        text ="Username must be filled out";
        errorUsernameLogin.innerHTML = text;
        return false;
    }
    if (password === "") {
        passwordLogin.style.borderColor = "red";
        text ="Password must be filled out";
        errorPasswordLogin.innerHTML = text;
        return false;
    }
}

//register validation 
function validateRegisterForm(){

var firstNameRegister = document.getElementById("firstNameRegister");
var lastNameRegister = document.getElementById("lastNameRegister");
var usernameRegister = document.getElementById("usernameRegister");
var passwordRegister = document.getElementById("passwordRegister");
var confirmPasswordRegister = document.getElementById("confirm-passwordRegister");

var firstname = firstNameRegister.value;
var lastname = lastNameRegister.value;
var username = usernameRegister.value;
var password = passwordRegister.value;
var confirmPassword = confirmPasswordRegister.value;

var errorFirstnameRegister = document.getElementById("errorFirstnameRegister");
var errorLastnameRegister = document.getElementById("errorLastnameRegister");
var errorUsernameRegister = document.getElementById("errorUsernameRegister");
var errorPasswordRegister = document.getElementById("errorPasswordRegister");
var errorConfirmPassword = document.getElementById("errorConfirmPassword");

firstNameRegister.style.borderColor = "";
errorFirstnameRegister.innerHTML = "";
lastNameRegister.style.borderColor = "";
errorLastnameRegister.innerHTML = "";
usernameRegister.style.borderColor = "";
errorUsernameRegister.innerHTML = "";
passwordRegister.style.borderColor = "";
errorPasswordRegister.innerHTML = "";
confirmPasswordRegister.style.borderColor = "";
errorConfirmPassword.innerHTML = "";

    if (firstname === "") {
        firstNameRegister.style.borderColor = "red";
        text ="First Name must be filled out";
        errorFirstnameRegister.innerHTML = text;
        return false;
    }
    if (lastname === "") {
        lastNameRegister.style.borderColor = "red";
        text ="Last Name must be filled out";
        errorLastnameRegister.innerHTML = text;
        return false;
    }
    if (username === "") {
        usernameRegister.style.borderColor = "red";
        text ="Username must be filled out";
        errorUsernameRegister.innerHTML = text;
        return false;
    }
    if (password === "") {
        passwordRegister.style.borderColor = "red";
        text ="Password must be filled out";
        errorPasswordRegister.innerHTML = text;
        return false;
    }
    if (password.length < 6) {
        passwordRegister.style.borderColor = "red";
        text ="Password must contain at least 6 characters";
        errorPasswordRegister.innerHTML = text;
        return false;
    }
    if (confirmPassword !== password) {
        confirmPasswordRegister.style.borderColor = "red";
        text ="Password doesn't match";
        errorConfirmPassword.innerHTML = text;
        return false;
    }
}


