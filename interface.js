       
assignmentbtn = document.getElementById('addAssignment');
assignmentdiv = document.getElementById('assignment');
btndiv = document.getElementById('btndiv');
cancelbtn = document.getElementById('cancelbtn');
removebtn = document.getElementById("remove");

assignmentbtn.onclick = function(){
btndiv.style.display = 'none';
//removediv.classList.add("hidden");
assignmentdiv.classList.remove('hidden');
}

cancelbtn.onclick = function(){
    btndiv.style.display = 'block';
    assignmentdiv.classList.add('hidden');
    removediv.classList.remove('hidden');
}
