- If you don't have cakephp2.5.5 in your local,
  - Download cakephp2.5.5 to your local.
  - Extract it.
- Remember the directory of lib/Cake of your cakephp2.5.5 project (called * CAKE_LIB_HOME_FOLDER*).
- cd to cakephp2.5.5-template (this project) folder.
- Remove the folder *lib/Cake*.
- create the link to *CAKE_LIB_HOME_FOLDER* in your *lib/* folder.

    ln -s *CAKE_LIB_HOME_FOLDER* Cake
