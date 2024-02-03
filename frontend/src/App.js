import "./App.css";
import Konyvek from "./component/Konyvek";
import DataService from "./model/DataService";
import Container from "react-bootstrap/Container";
import Row from "react-bootstrap/Row";
import { useEffect, useState } from "react";
import Tablazatom from "./component/Tablazatom";
const DS = new DataService();

function App() {
  let vegpont = "/books";
  const [objLista, setObjLista] = useState([{}]);
  const lista = ["Id", "Szerző", "Cím", "Leírás", "", ""];

  useEffect(() => {
    DS.getData(vegpont, setObjLista);
  }, []);

  function torles(id) {
    console.log("App.js");
    DS.deleteData(vegpont, id);
  }
  return (
    <div className="App">
      <header className="App-header"></header>
      <Container>
        <Row style={{ marginTop: "2em" }}>
          <Konyvek konyvek={objLista} />
        </Row>
        <Row>
          <Tablazatom adatok={objLista} lista={lista} torles={torles} />
        </Row>
      </Container>
    </div>
  );
}

export default App;
