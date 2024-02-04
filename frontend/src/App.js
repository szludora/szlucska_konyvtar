import "./App.css";
import Konyvek from "./component/kartyak/Konyvek";
import DataService from "./model/DataService";
import Container from "react-bootstrap/Container";
import Row from "react-bootstrap/Row";
import { useEffect, useState } from "react";
import Tablazatom from "./component/tablazatom/Tablazatom";
import Urlap from "./component/urlap/Urlap";
const DS = new DataService();

function App() {
  let vegpont = "/books";
  // Konyvek, Cella js-ben leellenőrizzük, hogy null az értéke vagy sem
  const lista = ["Id", "Szerző", "Cím", "Leírás", "", ""];
  const [objLista, setObjLista] = useState([{}]);

  //https://bobbyhadz.com/blog/react-too-many-re-renders-react-limits-the-number
  useEffect(() => {
    DS.getData(vegpont, setObjLista);
  }, []);

  function torles(id) {
    console.log("App.js");
    DS.deleteData(vegpont, id);
  }

  function kuldes(adat) {
    DS.postData(vegpont, adat);

    console.log("kuldve:", adat);
  }
  return (
    <div className="App">
      <header className="App-header">
        Props, state, eseménykezelők használata, gyakorlása
      </header>
      <Container>
        <Row>
          <Urlap kuldes={kuldes} />
        </Row>
        <Row style={{ marginTop: "2em" }}>
          <Konyvek konyvek={objLista} />
        </Row>
        <Row>
          <Tablazatom adatok={objLista} lista={lista} torles={torles} />
        </Row>
      </Container>
      <footer className="App-footer">Készítette: Szlucska Dóra</footer>
    </div>
  );
}

export default App;
