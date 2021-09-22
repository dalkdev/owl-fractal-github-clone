const rimraf = require('rimraf');

const removeFolders = ['dist', 'build'];

removeFolders.forEach(folderName => {
  console.log(`removing folder "${folderName}" ...`);
  rimraf.sync(folderName);
});

console.log('done');
