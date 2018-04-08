function showTime(date, docId)
{
    if (date=="")
    {
        document.getElementById("doc_time_slot").innerHTML="Select Time";
        return;
    }
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("doc_time_slot").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","show_time_slot.php?date="+date+"&docId="+docId,true);
    xmlhttp.send();
}

function checkTime(time, docId)
{
    date = document.getElementById(docId).value;
    if (date=="")
    {
        document.getElementById("time_slot").innerHTML="Select Time";
        return;
    }
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            if(xmlhttp.responseText.trim() == "valid")
            {
                document.getElementById("time_slot").innerHTML="Time Available";
                document.getElementById("booked").value="no";
            }
            else if(xmlhttp.responseText.trim() == "invalid")
            {
                document.getElementById("time_slot").innerHTML="Time Booked";
                document.getElementById("booked").value="yes";
            }
        }
    }
    xmlhttp.open("GET","check_time_slot.php?time="+time+"&docId="+docId+"&date="+date,true);
    xmlhttp.send();
}

function validate_form()
{
//    valid = false;
    booked = document.getElementById("booked").value;
    time = document.getElementsByName("doc_time")[0].value;
    if(booked.trim() == "no")
    {
        valid = true;
    }
    else
    {
        alert("Select Available Time");
        valid = false;
    }

    return valid;
}
