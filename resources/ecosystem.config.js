module.exports = {
  apps: [
    {
      name: 'dev-easy-wallet-admin',
      script: './start.js',
      env: {
        HOST: 'localhost',
        PORT: 3001
      }
    }
  ]
}
