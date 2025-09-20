function fetchPincodeDetails(pincode, callback) {
    if (pincode.length === 6) {
        fetch(`https://api.postalpincode.in/pincode/${pincode}`)
            .then(res => res.json())
            .then(data => {
                const info = data[0];
                if (info.Status === "Success") {
                    callback(info.PostOffice);
                } else {
                    alert("Invalid PIN code or no data found.");
                }
            })
            .catch(() => alert("Failed to fetch location data."));
    }
}

function fetchIFSCDetails(ifsc, callback) {
    if (ifsc.length === 11) {
        fetch(`https://ifsc.razorpay.com/${ifsc.toUpperCase()}`)
            .then(res => res.json())
            .then(data => {
                if (data.BANK) {
                    callback(data);
                } else {
                    alert("Invalid IFSC code.");
                }
            })
            .catch(() => alert("Failed to fetch bank details."));
    }
}
