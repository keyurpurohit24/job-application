var arg;
        function enable(){
            let h = document.getElementById('hindi').checked;
            let e = document.getElementById('english').checked;
            let g = document.getElementById('gujarati').checked;
            let php = document.getElementById('php').checked;
            let mysql = document.getElementById('mysql').checked;
            let laravel = document.getElementById('laravel').checked;
            if (h == true) {
                arg = 'hindi[]';
            }
            if (e == true) {
                arg = 'english[]';
            }
            if (g == true) {
                arg = 'gujarati[]'
            }
            if (php == true) {
                arg = 'phpLevel'
            }
            if (mysql == true) {
                arg = 'mysqlLevel'
            }
            if (laravel == true) {
                arg = 'laravelLevel'
            }
            let ar = document.getElementsByName(arg);
            console.log(ar);
            ar.forEach(element => {
                element.disabled = false;
            });
        }
        function disable(){
            let h = document.getElementById('hindi').checked;
            let e = document.getElementById('english').checked;
            let g = document.getElementById('gujarati').checked;
            let php = document.getElementById('php').checked;
            let mysql = document.getElementById('mysql').checked;
            let laravel = document.getElementById('laravel').checked;
            if (h == false) {
                let ar = document.getElementsByName('hindi[]');
                for (let i = 1; i < ar.length; i++) {
                    ar[i].disabled = true;
                }
            }
            if (e == false) {
                let ar = document.getElementsByName('english[]');
                for (let i = 1; i < ar.length; i++) {
                    ar[i].disabled = true;
                }
            }
            if (g == false) {
                let ar = document.getElementsByName('gujarati[]');
                for (let i = 1; i < ar.length; i++) {
                    ar[i].disabled = true;
                }
            }
            if (php == false) {
                let ar = document.getElementsByName('phpLevel');
                ar.forEach(element => {
                    element.disabled = true;
                });
            }

            if (mysql == false) {
                let ar = document.getElementsByName('mysqlLevel');
                ar.forEach(element => {
                    element.disabled = true;
                });
            }

            if (laravel == false) {
                let ar = document.getElementsByName('laravelLevel');
                ar.forEach(element => {
                    element.disabled = true;
                });
            }
        }