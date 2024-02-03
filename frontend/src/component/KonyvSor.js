import Button from "react-bootstrap/Button";

export default function KonyvSor(props) {
  function torles() {
    props.torles(props.elem.book_id);
  }
  return (
    <tr>
      <td>{props.elem.book_id}</td>
      <td>{props.elem.author}</td>
      <td>{props.elem.title}</td>
      <td>Valami leírás a könyvről</td>
      <td>
        <Button variant="danger" style={{ width: "6em" }} onClick={torles}>
          Törlés
        </Button>
      </td>
      <td>
        <Button variant="primary" style={{ width: "6em" }}>
          Módosít
        </Button>
      </td>
    </tr>
  );
}
