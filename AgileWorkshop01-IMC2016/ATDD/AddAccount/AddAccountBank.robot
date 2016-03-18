*** Settings ***


Library           Selenium2Library


*** Variables ***


*** Test Cases ***
Open Browser
    Open Browser    http://192.168.1.113/  chrome
    Wait Until Page Contains  Element  id=AccountName

    Input Text    id=AccountName    ประโยชน์ รุจิ 
    Input Text    id=AccountId    112805362
    Select From List By Index   id=BankDestName    112
    #Click Element    id=BankDestName

    Click Button    Submit


  # Input Text    id=AccountName    สมเกียรติ ปุ๋ยสูงเนิน
  # Input Text    id=AccountId    6292181176
  # Select From List By Index   id=BankDestName    2
    #Click Element    id=BankDestName

  # Click Button Submit



*** Keywords ***


