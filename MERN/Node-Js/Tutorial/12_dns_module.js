const dns = require('dns');

// dns.lookup('google.com', (error, address, family) => {
//     if (error) throw error;
//     console.log(address);
//     console.log(family);
// });


// dns.resolve('google.com', (error, address) => {
//     if (error) throw error;
//     console.log(address);
// });

// dns.resolve('google.com', 'MX', (error, address) => {
//     if (error) throw error;
//     console.log(address);
// });

dns.resolve('google.com', 'NS', (error, address) => {
    if (error) throw error;
    console.log(address);
});
