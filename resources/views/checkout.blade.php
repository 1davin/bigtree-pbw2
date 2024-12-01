<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<button id="pay-button" class="btn btn-primary">Pay Now</button>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function () {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                alert("Payment Success!");
                window.location.href = "/beranda"; // Redirect setelah sukses
            },
            onPending: function(result){
                alert("Waiting for your payment!");
            },
            onError: function(result){
                alert("Payment failed!");
            }
        });
    };
</script>
