<?php
declare(strict_types=1);
namespace In2code\Publications\Domain\Model\Dto;

use In2code\Publications\Domain\Model\Author;
use In2code\Publications\Domain\Repository\AuthorRepository;
use In2code\Publications\Utility\ObjectUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class Filter
 */
class Filter
{
    /**
     * @var int
     */
    protected $citestyle = 0;

    /**
     * @var int
     */
    protected $groupby = 0;

    /**
     * @var int
     */
    protected $recordsPerPage = 25;

    /**
     * @var int
     */
    protected $timeframe = 0;

    /**
     * @var array
     */
    protected $bibtypes = [];

    /**
     * @var int[]
     */
    protected $status = [];

    /**
     * @var array
     */
    protected $keywords = [];

    /**
     * @var array
     */
    protected $tags = [];

    /**
     * @var int
     */
    protected $author = 0;

    /**
     * @var int
     */
    protected $records = 0;

    /**
     * Filter constructor.
     * @param array $settings
     */
    public function __construct(array $settings)
    {
        $this->setCitestyle((int)$settings['citestyle']);
        $this->setGroupby((int)$settings['groupby']);
        $this->setRecordsPerPage((int)$settings['recordsPerPage']);
        $this->setTimeframe((int)$settings['timeframe']);
        $this->setBibtypes(GeneralUtility::trimExplode(',', $settings['bibtypes'], true));
        $this->setStatus(GeneralUtility::intExplode(',', $settings['status'], true));
        $this->setKeywords(GeneralUtility::trimExplode(PHP_EOL, $settings['keywords'], true));
        $this->setTags(GeneralUtility::trimExplode(PHP_EOL, $settings['tags'], true));
        $this->setAuthor((int)$settings['author']);
        $this->setRecords((int)$settings['records']);
    }

    /**
     * @return int
     */
    public function getCitestyle(): int
    {
        return $this->citestyle;
    }

    /**
     * @return bool
     */
    public function isCitestyleSet(): bool
    {
        return $this->getCitestyle() !== 0;
    }

    /**
     * @param int $citestyle
     * @return Filter
     */
    public function setCitestyle(int $citestyle): self
    {
        $this->citestyle = $citestyle;
        return $this;
    }

    /**
     * @return int
     */
    public function getGroupby(): int
    {
        return $this->groupby;
    }

    /**
     * @return bool
     */
    public function isGroupbySet(): bool
    {
        return $this->getGroupby() !== 0;
    }

    /**
     * @param int $groupby
     * @return Filter
     */
    public function setGroupby(int $groupby): self
    {
        $this->groupby = $groupby;
        return $this;
    }

    /**
     * @return int
     */
    public function getRecordsPerPage(): int
    {
        return $this->recordsPerPage;
    }

    /**
     * @return bool
     */
    public function isRecordsPerPageSet(): bool
    {
        return $this->getRecordsPerPage() !== 25;
    }

    /**
     * @param int $recordsPerPage
     * @return Filter
     */
    public function setRecordsPerPage(int $recordsPerPage): self
    {
        $this->recordsPerPage = $recordsPerPage;
        return $this;
    }

    /**
     * @return int
     */
    public function getTimeframe(): int
    {
        return $this->timeframe;
    }

    /**
     * @return bool
     */
    public function isTimeFrameSet(): bool
    {
        return $this->getTimeframe() !== 0;
    }

    /**
     * @return \DateTime
     */
    public function getDateFromTimeFrame()
    {
        $date = null;
        try {
            $date = new \DateTime();
            if ($this->getTimeframe() > 0) {
                $date->modify('- ' . $this->getTimeframe() . ' years');
            }
        } catch (\Exception $exception) {
        }
        return $date;
    }

    /**
     * @param int $timeframe
     * @return Filter
     */
    public function setTimeframe(int $timeframe): self
    {
        $this->timeframe = $timeframe;
        return $this;
    }

    /**
     * @return array
     */
    public function getBibtypes(): array
    {
        return $this->bibtypes;
    }

    /**
     * @return bool
     */
    public function isBibtypesSet(): bool
    {
        return $this->getBibtypes() !== [];
    }

    /**
     * @param array $bibtypes
     * @return Filter
     */
    public function setBibtypes(array $bibtypes): self
    {
        $this->bibtypes = $bibtypes;
        return $this;
    }

    /**
     * @return array
     */
    public function getStatus(): array
    {
        return $this->status;
    }

    /**
     * @return bool
     */
    public function isStatusSet(): bool
    {
        return $this->getStatus() !== [];
    }

    /**
     * @param array $status
     * @return Filter
     */
    public function setStatus(array $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return array
     */
    public function getKeywords(): array
    {
        return $this->keywords;
    }

    /**
     * @return bool
     */
    public function isKeywordsSet(): bool
    {
        return $this->getKeywords() !== [];
    }

    /**
     * @param array $keywords
     * @return Filter
     */
    public function setKeywords(array $keywords): self
    {
        $this->keywords = $keywords;
        return $this;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @return bool
     */
    public function isTagsSet(): bool
    {
        return $this->getTags() !== [];
    }

    /**
     * @param array $tags
     * @return Filter
     */
    public function setTags(array $tags): self
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return int
     */
    public function getAuthor(): int
    {
        return $this->author;
    }

    /**
     * @return null|Author
     */
    public function getAuthorObject()
    {
        if ($this->isAuthorSet()) {
            $authorRepository = ObjectUtility::getObjectManager()->get(AuthorRepository::class);
            return $authorRepository->findByUid($this->getAuthor());
        }
        return null;
    }

    /**
     * @return bool
     */
    public function isAuthorSet(): bool
    {
        return $this->getAuthor() !== 0;
    }

    /**
     * @param int $author
     * @return Filter
     */
    public function setAuthor(int $author): self
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return int
     */
    public function getRecords(): int
    {
        return $this->records;
    }

    /**
     * @return bool
     */
    public function isRecordsSet(): bool
    {
        return $this->getRecords() !== 0;
    }

    /**
     * @param int $records
     * @return Filter
     */
    public function setRecords(int $records): self
    {
        $this->records = $records;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFilterFlexFormSet(): bool
    {
        return $this->isCitestyleSet()
            || $this->isGroupbySet()
            || $this->isRecordsPerPageSet()
            || $this->isTimeFrameSet()
            || $this->isBibtypesSet()
            || $this->isStatusSet()
            || $this->isKeywordsSet()
            || $this->isTagsSet()
            || $this->isAuthorSet()
            || $this->isRecordsSet();
    }
}
