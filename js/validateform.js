function validate_form()
{
//    valid = false;

    patFirstname = document.getElementById("patFirstname").value.trim();
    patLastname = document.getElementById("patLastname").value.trim();
    emailAddress = document.getElementById("emailAddress").value.trim();
    phone = document.getElementById("phone").value.trim();

    if(patFirstname != "" && patLastname != "" && emailAddress != "" &&  phone != "")
    {
        valid = true;
    }
    else
    {
        document.getElementById(errorMsg) = "Fill Required Fields";
        valid = false;
    }

    return valid;
}
