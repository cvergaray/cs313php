    <div>
      <form action = "" id = "form">
        <br/><hr></hr>
        <h2>Star Trek Survey</h2>
        <table>
          <tr>
            <td>
              Name: 
            </td>
            <td>
              <input type = "text" size = "60" name = "name"/>
            </td>
          </tr>
          <tr>
            <td>
              Major: 
            </td>
            <td>
              <input type = "text" size = "60" name = "major"/>
            </td>
          </tr>
          <tr>
            <td>
              <p>Do you like Star Trek?</p>
            </td>
            <td>
              <input type = "radio" name = "radioButtons" value = "peor"> Not at all </input>
              <input type = "radio" name = "radioButtons" value = "mal"> Not really </input>
              <input type = "radio" name = "radioButtons" value = "bueno"> Kinda </input>
              <input type = "radio" name = "radioButtons" value = "mejor"> Oh Yeah! </input>
            </td>
          </tr>
        </table>

        <p>Which Star Trek series do you like? &nbsp
          <input type = "checkbox" name = "TOS" value = "tos"> TOS </input>
          <input type = "checkbox" name = "TAS" value = "tas"> TAS </input>
          <input type = "checkbox" name = "TNG" value = "tos"> TNG </input>
          <input type = "checkbox" name = "DS9" value = "ds9"> DS9 </input>
          <input type = "checkbox" name = "VOY" value = "voy"> VOY </input>
          <input type = "checkbox" name = "ENT" value = "ent"> ENT </input>
        </p>

        <p>
          <label> How many of the previous acronyms do you know the meaning of?
            <select name = "acronymns">
              <option> None </option>              
              <option> One </option>
              <option> Two </option>
              <option> Three </option>
              <option> Four </option>
              <option> Five </option>
              <option> Six </option>
            </select>
          </label>
        </p>

        <p>
          <label>
            <textarea name = "Reasons"  
                      rows = "5"  
                      cols = "90"
                      placeholder = "Please explain why you do or do not like Star Trek here"
                      background-color = "#9999ff"></textarea> 
                           <!--lcars light blue-->
          </label>
        </p>

        <br/>
        <input type = "submit" value = "Submit Form"/>
        <input type = "reset" value = "Clear Form"/>        
        <br/>
        <br/>
      </form>
      <hr/><br/>
    </div>