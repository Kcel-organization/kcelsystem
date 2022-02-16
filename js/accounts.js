addpupil = document.getElementById('addpupil');
pupilform = document.getElementById('addform');
pupiltable = document.getElementById('pupiltable');


addpupil.onclick = function(){
    pupiltable.classList.add('hidden');
    pupilform.classList.remove('hidden');
    
}