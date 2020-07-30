'use strict';

(() => {
  const url = 'http://validation/app/api.php';

  const getById = (id) => document.getElementById(id);

  const postData = (url) => (data = {}) => (
    fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data),
    })
      .then((res) => {
        if (res.status !== 200) {
          return Promise.reject();
        }

        return res.json();
      }));
  
  getById('submit-btn').addEventListener('click', (e) => {
    e.preventDefault();

    postData(url)({
      name: getById('name').value,
      email: getById('email').value,
      phone: getById('phone').value,
    })
      .then((data) => {
        const nameErr = getById('name-err');
        const emailErr = getById('email-err');
        const phoneErr = getById('phone-err');

        const { errors, message } = data;

        if (errors.name) {
          nameErr.innerText = errors.name;
        } else {
          nameErr.innerText = '';
        }

        if (errors.email) {
          emailErr.innerText = errors.email;
        } else {
          emailErr.innerText = '';
        }

        if (errors.phone) {
          phoneErr.innerText = errors.phone;
        } else {
          phoneErr.innerText = '';
        }

        if (message) {
          getById('message').innerText = message;
        }
      })
      .catch((err) => {
        console.error('err: ', err);
      });
  })
  
  

})();
