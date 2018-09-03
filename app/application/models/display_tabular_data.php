<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of display_tabular_data
 *
 * Pass a unique id as the first column of the array
 * @author Francisco
 */
class display_tabular_data
{

	private $table;

	private function getOpenTable($table_class)
	{
		return '
			<div class="row">
				<div>
					<table id="tab_data" class="table table-hover ' . $table_class . '">';
	}

	private function getCloseTable()
	{
		return '
					</table>
				</div>
			</div>';
	}

	private function getOpenTHead()
	{
		return '<thead>';
	}

	private function getCloseTHead()
	{
		return '</thead>';
	}

	private function getOpenTBody()
	{
		return '<tbody>';
	}

	private function getCloseTBody()
	{
		return '</tbody>';
	}

	private function getOpenHeader()
	{
		return '<tr class="text-info">';
	}

	private function getCloseHeader()
	{
		return '</tr>';
	}

	private function getOpenRow($id)
	{
		return ($id) ? '<tr id="' . $id . '">' : '<tr>';
	}

	private function getCloseRow()
	{
		return '</tr>';
	}

	private function getOpenCell($id = null, $value, $key = 'empty_cell')
	{
		if (is_numeric($value) && $value < 0) {
			//negative numbers
			return '<td style="max-width: 50px;" class="text-error ' . $id . ' ' . $key . '" id="' . $id . '">';
		} else {
			$haystack = strtoupper($key);
			$needle = 'DESCRIPTION';
			$match = strpos($haystack, $needle);

			if ($match > 0) {
				return ($value) ? '<td class="' . $id . ' ' . $key . '" id="' . $id . '">' : '<td class="' . $id . ' ' . $key . '" id="' . $id . '">';
			} else {
				return ($value) ? '<td style="max-width: 50px;" class="' . $id . ' ' . $key . '" id="' . $id . '">' : '<td style="max-width: 50px;" class="' . $id . ' ' . $key . '" id="' . $id . '">';
			}
		}
	}

	private function getCloseCell()
	{
		return '</td>';
	}

	public function getOpenCellBlank()
	{
		return '<td class="empty_cell">';
	}

	public function getCloseCellBlank()
	{
		return '</td>';
	}

	private function getOpenCellBold($header = 'empty_cell')
	{
		return '<td class="'.strtolower(preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $header)).'" nowrap><strong>';
	}

	private function getCloseCellBold()
	{
		return '</strong></td>';
	}

	private function getLowStockWarning($row)
	{
		//die(var_dump($row));
		if (!empty($row['item_qty']) && !empty($row['item_stock'])) {
			return ((int)$row['item_qty'] > (int)$row['item_stock']) ?
				'<span title="Low Inventory" style="float: right; margin-right: 3px;" class="icon-exclamation-sign"></span>' : '';
		}

		return '';
	}

	private function getNegativeStockWarning($row)
	{
		//die(var_dump($row));
		if (!empty($row['item_stock'])) {
			return ((int)$row['item_stock'] < 1) ?
				'<span title="Negative Inventory" style="float: right; margin-right: 3px;" class="icon-exclamation-sign"></span>' : '';
		}

		return '';
	}


	/**
	 *
	 * @param type $data
	 * @return type
	 */
	public function build_table(array $data = array(), $edit_delete_btn = false, $table_class = '')
	{
		if (empty($data)) {
			return 'No matches found';
		}
		$this->table .= self::getOpenTable($table_class);
		$this->table .= self::getOpenTHead();
		$this->table .= self::getOpenHeader();

		$columns = 0;

		$headers = reset($data);

		foreach ($headers as $header) {
			$this->table .= self::getOpenCellBold($header) . $header . self::getCloseCellBold() . self::getOpenCellBold() . self::getCloseCellBold();
			$columns++;
		}

		if ($edit_delete_btn) {
			$this->table .= self::getOpenCellBold() . 'Action' . self::getCloseCellBold();
			$columns++;
		}

		$ci = & get_instance();
		$ci->session->set_userdata('column_count', $columns);

		$this->table .= self::getCloseHeader();
		$this->table .= self::getCloseTHead();

		$this->table .= self::getOpenTBody();

		for ($i = 1; $i < sizeof($data); $i++) {
			if (isset($data[$i])) {
				$this->table .= self::getOpenRow(array_shift(array_values($data[$i])));

				foreach ($data[$i] as $key => $value) {
					$this->table .= self::getOpenCell(array_shift(array_values($data[$i])), $value, $key) . $value;
					$this->table .= self::getCloseCell();
					$this->table .= self::getOpenCellBlank();
					if ($key == 'item_qty') $this->table .= self::getLowStockWarning($data[$i]);
					if ($key == 'item_stock') $this->table .= self::getNegativeStockWarning($data[$i]);
					$this->table .= self::getCloseCellBlank();
				}

				if ($edit_delete_btn) {
					$this->table .= self::getOpenCell('action1', 'action2', 'action3') .
						'<span style="white-space: nowrap;"><button title="Edit" class="btn btn-mini btn-warning edit">
							<i class="icon-pencil icon-white"></i></button>
						 <button title="Delete" class="btn btn-mini btn-danger delete"><i class="icon-remove icon-white"></i></button><span>'
						. self::getCloseCell();
				}

				$this->table .= self::getCloseRow();
			}
		}

		$this->table .= self::getCloseTBody();

		$this->table .= self::getCloseTable();
		return $this->table;
	}
}

?>
