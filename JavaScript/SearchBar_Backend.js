function Search()
    {
        let Filter = document.getElementById('find').value.toUpperCase();
        let item = document.querySelectorAll('.pro');
        let l = document.getElementsByTagName('h5');

        for(var i = 0; i <=l.length; i++)
        {
            let a = item[i].getElementsByTagName('h5')[0];

            let value = a.innerHTML || a.innerText || a.textContent;

            if(value.toUpperCase().indexOf('Filter') > -1 )
            {
                item[i].style.display = "";
            }
            else
            {
                item[i].style.display = "none";

            }
        }
    }