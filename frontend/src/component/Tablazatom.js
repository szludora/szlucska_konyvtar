import Table from "react-bootstrap/Table";
import Cella from "./Cella";
import Fejlec from "./Fejlec";

export default function Tablazatom(props) {
  function torles(id) {
    console.log("táblázatom");
    props.torles(id);
  }

  return (
    <Table striped>
      <thead>
        <tr>
          <Fejlec lista={props.lista} />
        </tr>
      </thead>
      <tbody>
        <Cella lista={props.adatok} torles={torles} />
      </tbody>
    </Table>
  );
}
