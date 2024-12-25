document.addEventListener('DOMContentLoaded', function () {
    const servicesSelect = document.getElementById('services');
    const totalInput = document.getElementById('total');

    servicesSelect.addEventListener('change', function () {
        let total = 0;
        const selectedOptions = Array.from(servicesSelect.selectedOptions);
        
        selectedOptions.forEach(option => {
            const price = parseInt(option.getAttribute('data-price'), 10);
            if (!isNaN(price)) {
                total += price;
            }
        });

        
        totalInput.value = `Rp${total.toLocaleString()}`;
    });

    const payButton = document.getElementById('payButton');
    const paymentNotification = document.getElementById('paymentNotification');
    const amountInput = document.getElementById('amount');
    const paymentMethodSelect = document.getElementById('payment-method');
    const creditBankDiv = document.getElementById('credit-bank');  
    const ewalletChoiceDiv = document.getElementById('ewallet-choice');  

    paymentMethodSelect.addEventListener('change', function () {
    const paymentMethod = paymentMethodSelect.value;
    creditBankDiv.style.display = 'none';
    ewalletChoiceDiv.style.display = 'none';
    document.getElementById('pin-bank').style.display = 'none';
    document.getElementById('phone-ewallet').style.display = 'none';

    if (paymentMethod === 'credit-card') {
        creditBankDiv.style.display = 'block';
        document.getElementById('pin-bank').style.display = 'block'; 
    } else if (paymentMethod === 'ewallet') {
        ewalletChoiceDiv.style.display = 'block';
        document.getElementById('phone-ewallet').style.display = 'block'; 
    }
});
    
    payButton.addEventListener('click', function () {
        const name = document.getElementById('name').value;
        const date = document.getElementById('date').value;
        const time = document.getElementById('time').value;
        const paymentMethod = paymentMethodSelect.value;
        const amount = totalInput.value;
        const bank = document.getElementById('bank') ? document.getElementById('bank').value : '';
        const ewallet = document.getElementById('ewallet') ? document.getElementById('ewallet').value : '';

        if (!name || !date || !paymentMethod || !amount || parseInt(amount.replace(/[^0-9]/g, ''), 10) <= 0) {
            alert('Please fill in all fields correctly before proceeding with the payment.');
            return;
        }

        let paymentDetails = `Name: ${name}\nDate: ${date}\nTime: ${time}\nPayment Method: ${paymentMethod}\nTotal Amount: ${amount}`;

        if (paymentMethod === 'credit-card') {
            paymentDetails += `\nBank: ${bank}`;
        } else if (paymentMethod === 'ewallet') {
            paymentDetails += `\nE-Wallet: ${ewallet}`;
        }

        alert(`Processing payment...\n${paymentDetails}`);

        setTimeout(() => {
            paymentNotification.style.display = 'block';
            paymentNotification.textContent = `Payment of ${amount} was successful! Thank you, ${name}.`;

            document.getElementById('paymentForm').reset();
        }, 1000);
    });
});
