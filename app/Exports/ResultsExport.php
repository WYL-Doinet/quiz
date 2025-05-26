<?php

namespace App\Exports;

use App\Models\QuizAssignment;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ResultsExport implements FromCollection, WithHeadings, WithMapping, WithColumnWidths, WithStyles
{

    public function __construct(public $quizId) {}
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return QuizAssignment::with([
            'quiz' => fn($query) => $query->select('id', 'title'),
            'user' => fn($query) => $query->select('id', 'name')
        ])->where('quiz_id', $this->quizId)->get();
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getRowDimension(1)->setRowHeight(25);

        return [
            1 => [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
                'font' => [
                    'bold' => true,
                    'size' => 10,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '4f39f6'],
                ],
            ],
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'タイトル',
            'ユーザー名',
            'スコア',
            '割り当て日時',
            '完了済み'
        ];
    }


    public function map($row): array
    {

        return [
            $row->id,
            $row->quiz->title,
            $row->user->name,
            $row->score,
            Carbon::parse($row->assigned_at)->format('Y-m-d'),
            $row->completed_at
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 50,
            'C' => 20,
            'D' => 20,
            'E' => 20,
            'F' => 20,
        ];
    }
}
